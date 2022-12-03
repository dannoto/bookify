<?php
class plan_model extends CI_Model
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

    }

    public function getPlans()
    {
        $this->db->order_by('id', 'desc');

        $this->db->where('plan_delete_status', 1);
        return $this->db->get('users_plans')->result();
    }

    public function updateSubscribeStatus($stripe_subscription_id, $user_id, $status) {
        $this->db->where('user_id', $user_id);
        $this->db->where('stripe_subscription_id', $stripe_subscription_id);

        $data = array(
            'status' => $status
        );
        
        return $this->db->update('users_subscriptions', $data);
    }

    public function cancelSubscription($subscription_id) {

        $subscription_id = $this->getUserCurrentSubscription($subscription_id)['stripe_subscription_id'];
        $response = array();

        $cancel_request = $this->stripe_lib->cancelSubscription($subscription_id);

        if ($cancel_request) {


            $user = $this->session->userdata('session_user');
            $plan = $this->getPlan($user['user_plan']);

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

        print_r(json_encode($response));

    }

    public function getUserCurrentSubscription($subscription_id) {

        $this->db->where('id', $subscription_id);
        return $this->db->get('users_subscriptions')->row_array();
    }

    public function getPlan($plan_id)
    {

        $this->db->where('id', $plan_id);
        // $this->db->where('plan_delete_status', 1);
        return $this->db->get('users_plans')->row_array();
    }

    public function checkWatchCount($watch_date, $watch_ebook, $watch_user) {

        $this->db->where('watch_user', $watch_user);

        if ($watch_ebook != null) {
            $this->db->where('watch_ebook', $watch_ebook);
        }
        
        $this->db->like('watch_date', $watch_date);


        return $this->db->get('users_watch')->result();

    }

    public function insertWatchCount($watch_date, $watch_ebook, $watch_user) {

        $data = array(
            'watch_user' => $watch_user,
            'watch_ebook' => $watch_ebook, 
            'watch_date' => $watch_date,
        );

        return $this->db->insert('users_watch', $data);

    }

    public function addPlan($plan_name, $plan_description, $plan_price, $plan_type, $plan_limit_library, $plan_limit_quantity, $plan_limit_free, $plan_limit_premium, $plan_gateway_id)
    {


        $data = array(
            'plan_name' => $plan_name,
            'plan_description' => $plan_description,
            'plan_price' => $plan_price,
            'plan_type' => $plan_type,
            'plan_limit_library' => $plan_limit_library,
            'plan_limit_quantity' => $plan_limit_quantity,
            'plan_limit_free' => $plan_limit_free,
            'plan_limit_premium' => $plan_limit_premium,
            'plan_gateway_id' => $plan_gateway_id,
            'plan_delete_status' => 1,
        );

        return $this->db->insert('users_plans', $data);
    }

    public function updatePlan($plan_id,$plan_name, $plan_description, $plan_price, $plan_type, $plan_limit_library, $plan_limit_quantity, $plan_limit_free, $plan_limit_premium, $plan_gateway_id)
    {

        $this->db->where('id', $plan_id);

        $data = array(
            'plan_name' => $plan_name,
            'plan_description' => $plan_description,
            'plan_price' => $plan_price,
            'plan_type' => $plan_type,
            'plan_limit_library' => $plan_limit_library,
            'plan_limit_quantity' => $plan_limit_quantity,
            'plan_limit_free' => $plan_limit_free,
            'plan_limit_premium' => $plan_limit_premium,
            'plan_gateway_id' => $plan_gateway_id,
            'plan_delete_status' => 1,
        );

        return $this->db->update('users_plans', $data);
    }


    public function deletePlan($plan_id)
    {

        $this->db->where('id', $plan_id);

        $data = array(
            'plan_delete_status' => 0
        );

        return $this->db->update('users_plans', $data);
    }


    //Regulations

    public function countUserLibrary($user_id) {
        $this->db->where('library_user_id', $user_id);
        return $this->db->count_all_results('users_library');
    }

    public function getUserPlan($plan_id) {
        $this->db->where('id', $plan_id);
        return $this->db->get('users_plans')->row_array();
    }


    public function updateUserPlan($user_id, $plan_id) {

        $this->db->where('id', $user_id);

        $data = array(
            'user_plan' => $plan_id,
        );

        return $this->db->update('users', $data);
    }

    public function updateUserSubscription($user_id, $subscription_id) {

        $this->db->where('id', $user_id);

        $data = array(
            'user_subscription' => $subscription_id,
        );

        return $this->db->update('users', $data);
    }
}