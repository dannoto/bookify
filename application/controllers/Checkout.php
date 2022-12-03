<?php
defined('BASEPATH') or exit('No direct script access allowed');

 
class Checkout extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load Stripe library 
        $this->load->library('stripe_lib'); 
         
        // Load product model 
        $this->load->model('user_model'); 
        $this->load->model('plan_model'); 
        $this->load->model('payments_model'); 

        // Get user ID from current SESSION 
        $this->userID = $this->session->userdata('session_user')['id']; 
    } 
     
    public function index(){ 
        $data = array(); 
         
        // If payment form is submitted with token 
        if($this->input->post('stripeToken')){ 
            // Retrieve stripe token and user info from the posted form data 
            $postData = $this->input->post(); 
             
            // Make payment 
            $paymentID = $this->payment($postData); 
             
            // If payment successful 
            if($paymentID){ 
                redirect('user/pagamento_status'.$paymentID); 
            }else{ 
                $apiError = !empty($this->stripe_lib->api_error)?' ('.$this->stripe_lib->api_error.')':''; 
                $data['error_msg'] = 'Transaction has been failed!'.$apiError; 
                echo $data['error_msg'];
            } 
        } else {
            echo "no token";
        }
         
        // Get plans from the database 
        $data['plans'] = $this->plan_model->getPlans(); 
         
        // Pass plans data to the list view 
        $this->load->view('user/checkout', $data); 
    } 
     
    function payment($postData){ 
         
        // If post data is not empty 
        if(!empty($postData)){ 
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
            } else if ($planInterval == 4){
                $planInterval = "year";
            } else {
                $planInterval = "month";
            }
             
            // Add customer to stripe 
            $customer = $this->stripe_lib->addCustomer($name, $email, $token); 
             
            if($customer){ 
                // Create a plan 
                $plan = $this->stripe_lib->createPlan($planName, $planPrice, $planInterval); 
                 
                if($plan){ 
                    // Creates a new subscription 
                    $subscription = $this->stripe_lib->createSubscription($customer->id, $plan->id); 
                     
                    if($subscription){ 
                        // Check whether the subscription activation is successful 
                        if($subscription['status'] == 'active'){ 
                            // Subscription info 
                            $subscrID = $subscription['id']; 
                            $custID = $subscription['customer']; 
                            $planID = $subscription['plan']['id']; 
                            $planAmount = ($subscription['plan']['amount']/100); 
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

                            // Add Payment
                            $this->payments_model->addPayment($subscripData);

                            //Add Subscription
                            $subscription_id = $this->payments_model->insertSubscription($subscripData); 
                             
                            // Update subscription id in the users table  
                            // if($subscription_id && !empty($this->userID)){ 
                            //     $data = array('subscription_id' => $subscription_id); 
                            //     $update = $this->user_model->updateUser($data, $this->userID); 
                            // } 

                            // Add PLaymento
                             
                            return $subscription_id; 
                        } 
                    } 
                } 
            } 
        } 
        return false; 
    } 
     
    function payment_status($id){ 
        $data = array(); 
         
        // Get subscription data from the database 
        $subscription = $this->user_model->getSubscription($id); 
         
        // Pass subscription data to the view 
        $data['subscription'] = $subscription; 
        $this->load->view('user/pagamento_status', $data); 
    } 
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
