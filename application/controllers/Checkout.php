<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Checkout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        // Load Stripe library 
        $this->load->library('stripe_lib');

        // Load product model 
        $this->load->model('user_model');
        $this->load->model('plan_model');
        $this->load->model('payments_model');
        $this->load->model('email_model');

        $this->load->config('stripe');
		$this->load->library('stripe_lib');
        $this->user_model->authControl();

        // Get user ID from current SESSION 
        $this->userID = $this->session->userdata('session_user')['id'];
    }

    public function index($id)
    {

        $plan_get = htmlspecialchars($id);
        $plan = $this->plan_model->getPlan($plan_get);

        $user_data = $this->user_model->getUserById($this->userID);


        if ($plan) {

            $plan_id = $plan['id'];

            if ($plan['plan_price'] == 0) {

                if ($plan['plan_type'] == 1) {
                    $plan['plan_type'] = "Mês";
                } else if ($plan['plan_type'] == 4) {
                    $plan['plan_type'] = "Ano";
                } else {
                    $plan['plan_type'] = "Mês";
                }


                $subscripData = array(
                    'user_id' => $this->userID,
                    'plan_id' => $plan['id'],
                    'stripe_subscription_id' => "-",
                    'stripe_customer_id' => "-",
                    'stripe_plan_id' => "-",
                    'plan_amount' => 0,
                    'plan_amount_currency' => 'brl',
                    'plan_interval' => $plan['plan_type'],
                    'plan_interval_count' => "-",
                    'plan_period_start' => date('Y-m-d H:i:s'),
                    'plan_period_end' => "-",
                    'payer_email' => $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_email'],
                    'created' => date('Y-m-d H:i:s'),
                    'status' => "active",
                );

                //Cancel current plan/subscriptions.
                if ($user_data['user_plan'] != 0) {
                    $this->cancelCurrentSubscription($user_data['user_subscription']);
                }

                // Add Payment
                $this->payments_model->addPayment($subscripData);

                //Add Subscription
                $subscription_id = $this->payments_model->insertSubscription($subscripData);

                // UpdateSubscription
                $this->plan_model->updateUserSubscription($this->session->userdata('session_user')['id'], $subscription_id);

                //  UpdateUser Plan
                if ($this->plan_model->updateUserPlan($this->session->userdata('session_user')['id'], $plan_id)) {
                    redirect(base_url('planos/sucesso?id=' . $subscription_id . ''));
                }
            } else {


                // If payment form is submitted with token 
                if ($this->input->post('stripeToken')) {
                    // Retrieve stripe token and user info from the posted form data 
                    $postData = $this->input->post();

                    // Make payment 
                    $paymentID = $this->payment($postData, $plan_id, $user_data);

                    // If payment successful 
                    if ($paymentID) {
                        // redirect('user/pagamento_status' . $paymentID);
                        redirect(base_url('planos/sucesso?id=' . $paymentID . ''));
                    } else {
                        $apiError = !empty($this->stripe_lib->api_error) ? ' (' . $this->stripe_lib->api_error . ')' : '';
                        $data['error_msg'] = $apiError;

                        redirect(base_url('planos/falhou?message=' . $data['error_msg']));
                    }
                }

                // Get plans from the database 
                $data['plan'] = $plan;

                // Pass plans data to the list view 
                $this->load->view('user/checkout', $data);
            }
        } else {
            redirect(base_url('planos'));
        }
    }

    function payment($postData, $plan_id,$user_data)
    {

        // If post data is not empty 
        if (!empty($postData)) {
            // Retrieve stripe token and user info from the submitted form data 
            $token  = $postData['stripeToken'];
            $name = $postData['name'];
            $email = $postData['email'];

            // Plan info 
            $planID = $_POST['subscr_plan'];
            $planInfo = $this->plan_model->getPlan($planID);
            $planName = $planInfo['plan_name'];
            $planPrice = $planInfo['plan_price'];
            $planInterval = $planInfo['plan_type'];

            if ($planInterval == 1) {
                $planInterval = "month";
            } else if ($planInterval == 4) {
                $planInterval = "year";
            } else {
                $planInterval = "month";
            }

            // Add customer to stripe 
            $customer = $this->stripe_lib->addCustomer($name, $email, $token);

            if ($customer) {
                // Create a plan 
                $plan = $this->stripe_lib->createPlan($planName, $planPrice, $planInterval);

                if ($plan) {
                    // Creates a new subscription 
                    $subscription = $this->stripe_lib->createSubscription($customer->id, $plan->id);

                    if ($subscription) {
                        // Check whether the subscription activation is successful 
                        if ($subscription['status'] == 'active') {
                            // Subscription info 
                            $subscrID = $subscription['id'];
                            $custID = $subscription['customer'];
                            $planID = $subscription['plan']['id'];
                            $planAmount = ($subscription['plan']['amount'] / 100);
                            $planCurrency = $subscription['plan']['currency'];
                            $planInterval = $subscription['plan']['interval'];
                            $planIntervalCount = $subscription['plan']['interval_count'];
                            $created = date("Y-m-d H:i:s", $subscription['created']);
                            $current_period_start = date("Y-m-d H:i:s", $subscription['current_period_start']);
                            $current_period_end = date("Y-m-d H:i:s", $subscription['current_period_end']);
                            $status = $subscription['status'];

                            // Insert tansaction data into the database 
                            $subscripData = array(
                                'user_id' => $this->userID,
                                'plan_id' => $planInfo['id'],
                                'stripe_subscription_id' => $subscrID,
                                'stripe_customer_id' => $custID,
                                'stripe_plan_id' => $planID,
                                'plan_amount' => $planAmount,
                                'plan_amount_currency' => $planCurrency,
                                'plan_interval' => $planInterval,
                                'plan_interval_count' => $planIntervalCount,
                                'plan_period_start' => $current_period_start,
                                'plan_period_end' => $current_period_end,
                                'payer_email' => $email,
                                'created' => $created,
                                'status' => $status
                            );

                            //Cancel current plan/subscriptions.
                            if ($user_data['user_plan'] != 0) {
                                $this->cancelCurrentSubscription($user_data['user_subscription']);
                            }

                            // Add Payment
                            $this->payments_model->addPayment($subscripData);

                            //Add Subscription
                            $subscription_id = $this->payments_model->insertSubscription($subscripData);

                            // Update subscription id in the users table  
                            if ($subscription_id) {

                                //Upddate Plan ; 
                                $this->plan_model->updateUserPlan($this->session->userdata('session_user')['id'], $plan_id);

                                // Update Subscription
                                $this->plan_model->updateUserSubscription($this->userID, $subscription_id);
                            }


                            return $subscription_id;
                        }
                    }
                }
            }
        }
        return false;
    }

    function cancelCurrentSubscription($subscription_id)
    {
        $response = array();

        $cancel_request = $this->stripe_lib->cancelSubscription($subscription_id);

        if ($cancel_request) {


            $user = $this->session->userdata('session_user');
            $plan = $this->plan_model->getPlan($user['user_plan']);

            if ($cancel_request['status'] == 'canceled') {

                if ($this->plan_model->updateSubscribeStatus($cancel_request['id'], $user['id'], 'canceled')) {

                    $this->email_model->canceledSubscribe($user, $plan, $cancel_request);
                    $response =  array('status' => 'true', 'message' => 'Sua assinatura foi cancelada. Voce não será mais cobrado.');
                } else {
                    $response =  array('status' => 'false', 'message' => 'Houve um problema no cancelamento. Contate o suporte.');
                }
            } else {
                $response =  array('status' => 'false', 'message' => 'Houve um problema no cancelamento. Contate o suporte.');
            }
        } else {
            $response =  array('status' => 'false', 'message' => 'Houve um problema no cancelamento. Contate o suporte.');
        }

        // print_r(json_encode($response));
    }

    // function payment_status($id)
    // {
    //     $data = array();

    //     // Get subscription data from the database 
    //     $subscription = $this->user_model->getSubscription($id);

    //     // Pass subscription data to the view 
    //     $data['subscription'] = $subscription;
    //     $this->load->view('user/pagamento_status', $data);
    // }
}

// class Checkout extends CI_Controller
// {

// 	public function __construct()
// 	{

// 		parent::__construct();
// 		$this->load->model('register_model');
// 		$this->load->model('login_model');
// 		$this->load->model('user_model');
// 		$this->load->model('email_model');
// 		$this->load->model('category_model');
// 		$this->load->model('config_model');
// 		$this->load->model('plan_model');

// 	}


// 	public function index($id)
// 	{

//         $plan_id = htmlspecialchars($id);
//         $plan = $this->plan_model->getPlan($plan_id);


//         if ($plan) {
            
//             if ($plan['plan_price'] == 0 ) {


//                 if ($this->plan_model->updateUserPlan($this->session->userdata('session_user')['id'], $plan['id']))
//                 {
//                     redirect(base_url('planos/obrigado'));
//                 } 
                

//             } else {

//                 $data = array(
        
//                 );
        
//                 $this->load->view('user/checkout', $data);
//             }


    
//         } else {
//             redirect(base_url('planos'));
//         }

// 	}
// }
