<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Busca extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('category_model');
	}


	public function index()
	{


		// Pagination
		$limite_por_pagina = 3;

		if (htmlspecialchars($this->input->get('p')) <= 0) {
			$pagina_atual = 0;
		} else {
			$pagina_atual = (htmlspecialchars($this->input->get('p')) - 1);
		}

		$limite_calculado =  $pagina_atual * $limite_por_pagina;


		if ($this->input->get()) {


			$ebook_precificacao = htmlspecialchars($this->input->get('ebook_precificacao'));
			$ebook_category = htmlspecialchars($this->input->get('ebook_category'));
			$ebook_title = htmlspecialchars($this->input->get('ebook_title'));

			$data = array(
				'ebooks' => $this->ebook_model->getEbooksSearch($ebook_precificacao, $ebook_category, $ebook_title, $limite_calculado, $limite_por_pagina),
				'total_pages' => intval(ceil(count($this->ebook_model->getEbooksSearch($ebook_precificacao, $ebook_category, $ebook_title)) / $limite_por_pagina)),
				'features' => $this->category_model->getFeatures(),
				'categorias' => $this->category_model->getCategories(),
			);
		} else {

			$data = array(
				'ebooks' => $this->ebook_model->getEbooks($limite_calculado, $limite_por_pagina),
				'total_pages' => intval(ceil(count($this->ebook_model->getEbooks()) / $limite_por_pagina)),
				'features' => $this->category_model->getFeatures(),
				'categorias' => $this->category_model->getCategories(),

			);
		}



		$this->load->view('user/busca', $data);
	}
}
