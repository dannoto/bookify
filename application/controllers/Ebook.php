<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('ebook_model');
		$this->load->model('chapter_model');
		$this->load->model('audio_model');


	}
	public function detalhes($ebook_id)
	{

		$ebook = $this->ebook_model->getEbook($ebook_id);

		if ($ebook) {

			$data= array(
				'ebook' => $this->ebook_model->getEbook($ebook_id),
			);
	
			$this->load->view('user/ebook_details', $data);

		} else {
			redirect(base_url('catalogo'));
		}
	}

}
