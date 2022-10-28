<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planos extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('plan_model');


	}


    public function index() {

		$data  = array(
			'planos' => $this->plan_model->getPlans()
		);

        $this->load->view('user/planos',$data);
    }
 }