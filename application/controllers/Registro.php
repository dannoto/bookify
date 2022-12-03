<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');

//
	}
	public function index()
	{

		
		
		$this->load->view('user/registro');
	}
	
	public function add_user() {

		$response = array();
		
		if ($this->input->post() ) {

			$user_name = htmlspecialchars($this->input->post('user_name'));
			$user_surname = htmlspecialchars($this->input->post('user_surname'));
			$user_email = htmlspecialchars($this->input->post('user_email'));
			$user_password = htmlspecialchars($this->input->post('user_password'));
			$user_origin = htmlspecialchars($this->input->post('user_origin'));

		


			// Validations
			$validate_email = $this->register_model->validate_email($user_email);
			

			if ($validate_email) {

				if ($this->register_model->addUser($user_name, $user_surname, $user_email, $user_password, $user_origin)) {


					$auth = $this->login_model->Auth($user_email, $user_password);

					if ($auth) {

						$this->session->set_userdata('session_user', $auth);

						// $response =  array('status' => 'true', 'message' => 'Logado com sucesso!');

					} else {

						// $response =  array('status' => 'false', 'message' => 'Suas credenciais estão incorretas.');

					}

					$response =  array('status' => 'true', 'message' => 'Cadastrado com sucesso.');


				} else {

					$response =  array('status' => 'false', 'message' => 'Ocorreu um erro temporário.');

				}

			} else {

				$response =  array('status' => 'false', 'message' => 'Este e-mail já está sendo usado.');
				
			}



			
			

			print_r(json_encode($response));

		}
	}

}
