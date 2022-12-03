<?php
class plan_model extends CI_Model
{

    public function getPlans()
    {
        $this->db->order_by('id', 'desc');

        $this->db->where('plan_delete_status', 1);
        return $this->db->get('users_plans')->result();
    }

    public function getUserCurrentPlan($user_id) {

        $this->db->where('user_id', $user_id);
        $this->db->where('status','active');
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
}