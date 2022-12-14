<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biblioteca extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');

		$this->load->model('user_model');
		$this->user_model->authControl();
		$this->user_model->authPlan();

		$this->load->model('email_model');
		$this->load->model('library_model');
		$this->load->model('plan_model');
		$this->load->model('ebook_model');
		$this->load->model('config_model');
	}


	public function index()
	{

		$filter = htmlspecialchars($this->input->get('classificacao'));

		if ($filter) {

			$library = $this->library_model->getLibrary($this->session->userdata('session_user')['id']);

			if ($filter == "concluidos") {

				$data = array(
					'library' => $this->library_model->getLibraryComplete($library, $this->session->userdata('session_user')['id']),
				);
			

			} else if ($filter == "andamento") {

				$data = array(
					'library' => $this->library_model->getLibraryProgress($library, $this->session->userdata('session_user')['id']),
				);

			} else  {

				$data = array(
					'library' => $this->library_model->getLibrary($this->session->userdata('session_user')['id']),
				);
			}

		} else {

			$data = array(
				'library' => $this->library_model->getLibrary($this->session->userdata('session_user')['id']),
			);
		}


		$this->load->view('user/biblioteca', $data);
	}

	public function actaddlibrary()
	{

		$response = array();

		$ebook_id =  htmlspecialchars($this->input->post('ebook_id'));
		$ebook_user = htmlspecialchars($this->input->post('ebook_user'));

		// Limit
		$user_plan = $this->plan_model->getUserPlan($this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_plan'] );
		$user_count_library = $this->plan_model->countUserLibrary($this->session->userdata('session_user')['id']);


		if ($user_count_library < $user_plan['plan_limit_library'] || $user_plan['plan_limit_library'] == "-1") {

			if ($this->library_model->isLibrary($ebook_id, $ebook_user)) {

				$response =  array('status' => 'false', 'message' => 'Este item j?? est?? na sua biblioteca.');
			} else {

				if ($this->library_model->addLibrary($ebook_id, $ebook_user)) {
					$response =  array('status' => 'true', 'message' => 'Adicionado com sucesso!');
				} else {
					$response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
				}
			}
		} else {

			$response =  array('status' => 'upgrade', 'message' => 'Voc?? atingiu o limite do uso da biblioteca. ');
		}

		print_r(json_encode($response));
	}


	public function actremovelibrary()
	{

		$response = array();

		$ebook_id =  htmlspecialchars($this->input->post('ebook_id'));
		$ebook_user = htmlspecialchars($this->input->post('ebook_user'));

		// Limit
		$user_plan = $this->plan_model->getUserPlan($this->session->userdata('session_user')['user_plan']);
		$user_count_library = $this->plan_model->countUserLibrary($this->session->userdata('session_user')['id']);




		if ($this->library_model->removeLibrary($ebook_id, $ebook_user)) {
			$response =  array('status' => 'true', 'message' => 'Removido com sucesso!');
		} else {
			$response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
		}


		print_r(json_encode($response));
	}
}
