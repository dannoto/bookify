<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalogo extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');

		$this->load->model('user_model');
        $this->user_model->authPlan();
		
		$this->load->model('email_model');
		$this->load->model('category_model');
		$this->load->model('ebook_model');
		$this->load->model('config_model');

	}


	public function index()
	{

		$data = array(
			'features' => $this->category_model->getFeatures(),
			'categorias' => $this->category_model->getCategories(),

		);

		$this->load->view('user/catalogo', $data);
	}

	public function d($featured_slug)
	{

		
		$featured_slug = htmlspecialchars($featured_slug);
		$featured_id = $this->category_model->getFeaturesIdBySlug($featured_slug);


		// Pagination
		$limite_por_pagina = 25;

		if (htmlspecialchars($this->input->get('p')) <= 0) {
			$pagina_atual = 0;
		} else {
			$pagina_atual = (htmlspecialchars($this->input->get('p')) - 1);
		}

		$limite_calculado =  $pagina_atual * $limite_por_pagina;


		if (strlen($this->input->get('precificacao')) > 0) {

			$ebook_precificacao = htmlspecialchars($this->input->get('precificacao'));

			$data = array(
				'features' => $this->category_model->getFeature($featured_id),
				'ebooks' => $this->ebook_model->getEbooksByFeaturesTotalPrecificacao($featured_id, $ebook_precificacao, $limite_calculado, $limite_por_pagina),
				'total_pages' => intval(ceil(count($this->ebook_model->getEbooksByFeaturesTotalPrecificacao($featured_id, $ebook_precificacao)) / $limite_por_pagina)),
			);


		} else {

			$data = array(
				'features' => $this->category_model->getFeature($featured_id),
				'ebooks' => $this->ebook_model->getEbooksByFeaturesTotal($featured_id, $limite_calculado, $limite_por_pagina),
				'total_pages' => intval(ceil(count($this->ebook_model->getEbooksByFeaturesTotal($featured_id)) / $limite_por_pagina)),

			);
		}

		$this->load->view('user/catalogo_features', $data);

	}

	public function c($category_slug)
	{

		$category_slug = htmlspecialchars($category_slug);
		$category_id = $this->category_model->getCategoryIdBySlug($category_slug);


		// Pagination
		$limite_por_pagina = 25;

		if (htmlspecialchars($this->input->get('p')) <= 0) {
			$pagina_atual = 0;
		} else {
			$pagina_atual = (htmlspecialchars($this->input->get('p')) - 1);
		}

		$limite_calculado =  $pagina_atual * $limite_por_pagina;


		if (strlen($this->input->get('precificacao')) > 0) {

			$ebook_precificacao = htmlspecialchars($this->input->get('precificacao'));

			$data = array(
				'category' => $this->category_model->getCategory($category_id),
				'ebooks' => $this->ebook_model->getEbooksByCategoryTotalPrecificacao($category_id, $ebook_precificacao, $limite_calculado, $limite_por_pagina),
				'total_pages' => intval(ceil(count($this->ebook_model->getEbooksByCategoryTotalPrecificacao($category_id, $ebook_precificacao)) / $limite_por_pagina)),
			);


		} else {

			$data = array(
				'category' => $this->category_model->getCategory($category_id),
				'ebooks' => $this->ebook_model->getEbooksByCategoryTotal($category_id, $limite_calculado, $limite_por_pagina),
				'total_pages' => intval(ceil(count($this->ebook_model->getEbooksByCategoryTotal($category_id)) / $limite_por_pagina)),

			);
		}



		$this->load->view('user/catalogo_categories', $data);

	}
}
