<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Planos extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('faq_model');

		$this->load->model('email_model');
		$this->load->model('plan_model');

		$this->load->model('config_model');

	}


    public function index() {

		$data  = array(
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),
		);

        $this->load->view('user/planos',$data);
    }

	public function escolha() {

		$data  = array(
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),
		);

        $this->load->view('user/planos_escolha',$data);
    }

	public function obrigado() {

		$data  = array(
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),
		);

        $this->load->view('user/planos_obrigado',$data);
    }
 }