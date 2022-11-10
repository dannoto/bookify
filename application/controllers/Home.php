<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('category_model');
		$this->load->model('ebook_model');
		$this->load->model('plan_model');
		$this->load->model('faq_model');
		$this->load->model('config_model');

	}

    public function index() {

		if ($this->input->get()) {
			$ref = htmlspecialchars($this->input->get('ref'));

			setcookie('ref', $ref, (time() + (30 * 24 * 3600)) );
		}

		$data = array(
			'features' => $this->category_model->getFeatures(),
			'categorias' => $this->category_model->getCategories(),
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),

		);

		// $this->load->view('user/catalogo');
        $this->load->view('user/home', $data);
    }

}