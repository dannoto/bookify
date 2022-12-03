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

		$this->load->config('stripe');
		$this->load->library('stripe_lib');


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

	public function sucesso() {

		$data  = array(
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),
		);

        $this->load->view('user/planos_sucesso',$data);
    }

	public function falhou() {



		$data  = array(
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),
			'message' => $this->input->get('message'),
		);

        $this->load->view('user/planos_falhou',$data);
    }


	public function cancelar() {

		if ($this->input->get()) {

				$subscription_id = $this->input->get('subscription_id');

				$response = array();

				$cancel_request = $this->stripe_lib->cancelSubscription($subscription_id);

				if ($cancel_request) {
					echo "ok <br>";
					print_r($cancel_request);
				} else {
					echo "erro <br>";
					print_r($cancel_request);
				}

		} else {
			redirect(base_url('conta/assinaturas'));
		}
	}
 }