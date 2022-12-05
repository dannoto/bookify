<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajuda extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
        $this->load->model('login_model');

        $this->load->model('user_model');

        $this->load->model('email_model');
        $this->load->model('category_model');
        $this->load->model('payments_model');
        $this->load->model('config_model');
        $this->load->model('admin_model');
        $this->load->model('faq_model');

        $this->load->model('audio_model');
        $this->load->model('ebook_model');
        $this->load->model('chapter_model');
        $this->load->model('plan_model');



	}


    public function index() {
	
		$data = array(
			'features' => $this->category_model->getFeatures(),
			'categorias' => $this->category_model->getCategories(),
			'planos' => $this->plan_model->getPlans(),
			'config' => $this->config_model->getConfigDesign(),

		);

        $this->load->view('user/ajuda', $data);
    }
 }