<?php
class user_model extends CI_Model
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

    public function getUserByEmail($user_email)
    {

        $this->db->where('user_email', $user_email);
        return $this->db->get('users')->row_array();
    }

    //
    public function getUsers()
    {

        return $this->db->get('users')->result();
    }

    public function getUserByToken($user_token)
    {
        $this->db->where('user_token', $user_token);
        return $this->db->get('users')->row_array();
    }

    public function getUserById($user_id)
    {
        $this->db->where('id', $user_id);
        return $this->db->get('users')->row_array();
    }

    public function updateUserCredits($raffle_user, $raffle_amount, $user_credits)
    {

        $this->db->where('id', $raffle_user);

        $data = array(
            'user_credit' => ($raffle_amount + $user_credits),
        );

        return $this->db->update('users', $data);
    }

    public function updateImage($user_id, $user_image)
    {

        $this->db->where('id', $user_id);

        $data = array(
            'user_image' => $user_image,
        );

        return $this->db->update('users', $data);
    }

    public function updatePerfil($user_id, $user_name, $user_surname, $user_email, $user_street, $user_city, $user_district, $user_state, $user_cep)
    {

        $this->db->where('id', $user_id);

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'user_surname' => $user_surname,
            'user_email' => $user_email,
            'user_street' => $user_street,
            'user_city' => $user_city,
            'user_district' => $user_district,
            'user_state' => $user_state,
            'user_cep' => $user_cep,
        );

        return $this->db->update('users', $data);
    }

    public function updateUserAdmin($user_id,  $user_image, $user_name, $user_surname, $user_email, $user_street, $user_city, $user_district, $user_state, $user_cep, $user_plan, $user_status)
    {

        $this->db->where('id', $user_id);

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'user_surname' => $user_surname,
            'user_email' => $user_email,
            'user_street' => $user_street,
            'user_city' => $user_city,
            'user_district' => $user_district,
            'user_state' => $user_state,
            'user_cep' => $user_cep,
            'user_plan' => $user_plan,
            'user_status' => $user_status,
            'user_image' =>  $user_image

        );

        return $this->db->update('users', $data);
    }


    public function updatePassword($user_id, $password)
    {
        $this->db->where('id', $user_id);

        $data = array(
            'user_password' => md5($password),
        );
        return $this->db->update('users', $data);
    }

    public function updateToken($user_id)
    {
        $this->db->where('id', $user_id);

        $data = array(
            'user_token' => mt_rand(),
        );
        return $this->db->update('users', $data);
    }



    public function authControl()
    {

        if ($this->session->userdata('session_user')) {

            $user_data = $this->user_model->getUserById($this->session->userdata('session_user')['id']);
            $user_current_subscription = $this->plan_model->getUserCurrentSubscription($user_data['user_subscription']);

            // $expiration_date = strtotime($user_current_subscription['plan_period_end']);
            // $expiration_date = DateTime::createFromFormat("Y-m-d H:i:s", $user_current_subscription['plan_period_end']); 
            $expiration_date = date('d-m-Y',strtotime($user_current_subscription['plan_period_end']));
            $today = date('d-m-Y',time()); 

            $expiration_date =  date_create($expiration_date);
            $today = date_create($today);
            $today_limit = date($user_current_subscription['plan_period_end'], strtotime("+3 days"));

            $diff =  date_diff($today, $expiration_date);

            if($diff->format("%R%a") > 0){
                echo "active";
            }else{
                echo "inactive";
            }
            echo "Remaining Days ".$diff->format("%R%a days"). " totar limit: ". $today_limit;
            // echo "<br>EXPIRATION DATE: ".$expiration_date;
            // echo "<br>TODAY: ".$today;
            // echo "<br>LIMIT: ".$today_limit;

            if ($user_current_subscription['status'] == 'canceled') {

                if ($expiration_date > $today) {

                    echo "Cancelado e plano resetado.";

                    //Reset Plan
                    // $this->plan_model->updateUserPlan($user_data['id'], '0');
                } else {
                    echo "Cancelado, mas ainda esta valido";
                }

            } else if ($user_current_subscription['status'] == 'active') {

                if ($expiration_date > $today_limit) {

                    echo "Não pagou, cancelando a pe plano resetado.";

                    //CancelSubscription
                    // $this->plan_model->cancelSubscription($user_data['user_subscription']);
                    
                    //Reset Plan
                    // $this->plan_model->updateUserPlan($user_data['id'], '0');
                } else {
                    echo "Plano ainda nao venceu, esta valido";
                }
            }
        } else {

            redirect(base_url('login'));
        }
    }

    public function authPlan()
    {

        if ($this->session->userdata('session_user')) {


            if ($this->getUserById($this->session->userdata('session_user')['id'])['user_plan'] == "0") {

                redirect(base_url('planos/escolha'));
            } else {
            }
        } else {
        }
    }
}
