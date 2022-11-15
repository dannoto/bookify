<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkout extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('category_model');
		$this->load->model('config_model');
		$this->load->model('plan_model');

	}


	public function index($id)
	{

        $plan_id = htmlspecialchars($id);
        $plan = $this->plan_model->getPlan($plan_id);


        if ($plan) {
            
            if ($plan['plan_price'] == 0 ) {


                if ($this->plan_model->updateUserPlan($this->session->userdata('session_user')['id'], $plan['id']))
                {
                    redirect(base_url('planos/obrigado'));
                } 
                

            } else {

                $data = array(
        
                );
        
                $this->load->view('user/checkout', $data);
            }


    
        } else {
            redirect(base_url('planos'));
        }

	}
}
