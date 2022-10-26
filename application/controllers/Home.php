<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');


	}

    public function index() {

		if ($this->input->get()) {
			$ref = htmlspecialchars($this->input->get('ref'));

			setcookie('ref', $ref, (time() + (30 * 24 * 3600)) );
		}
        $this->load->view('user/home');
    }

}