<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogo extends CI_Controller {

	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('category_model');
		$this->load->model('ebook_model');


	}


    public function index() {

		$data= array(
			'features' => $this->category_model->getFeatures(),
			'categorias' => $this->category_model->getCategories(),

		);

        $this->load->view('user/catalogo', $data);
    }

	public function d($featured_slug) {

		$featured_slug = htmlspecialchars($featured_slug);
		$featured_id = $this->category_model->getFeaturesIdBySlug($featured_slug);

		$data= array(
			'featured' => $this->category_model->getFeatures($featured_id),
			'features' => $this->category_model->getFeatures(),
			'categorias' => $this->category_model->getCategories(),
			'ebooks' => $this->ebook_model->getEbooksByFeaturesTotal($featured_id),

		);

        $this->load->view('user/catalogo_features', $data);
	}

	public function c($category_slug) {

		$category_slug = htmlspecialchars($category_slug);
		$category_id = $this->category_model->getCategoryIdBySlug($category_slug);

		echo $category_id;

		$data= array(
			'category' => $this->category_model->getCategory($category_id),
			'ebooks' => $this->ebook_model->getEbooksByCategoryTotal($category_slug),
		);
		print_r($data['featured']);

		print_r($data['ebooks']);

        $this->load->view('user/catalogo_categories', $data);
	}

	
 }