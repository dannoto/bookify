<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Play extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('admin_model');
		$this->load->model('category_model');
		$this->load->model('raffles_model');
		$this->load->model('payments_model');
		$this->load->model('cart_model');
		$this->load->model('chapter_model');
		$this->load->model('ebook_model');

		$this->load->model('audio_model');
	}

	public function index()
	{
	}

	public function u($ebook_id = null)
	{


		//Check Progress



		if ($this->input->get('s')) {

			$audio_id = htmlspecialchars($this->input->get('s'));
			// echo $audio_id;
		} else {

			if ($this->audio_model->getProgressCurrent($ebook_id) > 0) {
				// echo "current";
				$audio_id = $this->audio_model->getProgressCurrent($ebook_id)['progress_audio'];
			} else {
				// echo "firest";
				$audio_id = $this->audio_model->getProgressFirst($ebook_id)['id'];
				// echo $audio_id;
			}
		}

		if (!$audio_id) {
			redirect(base_url('catalogo'));
		}


		$audio = $this->audio_model->getAudio($audio_id);
		$chapter = $this->chapter_model->getChapter($audio['audio_chapter']);
		$ebook = $this->ebook_model->getEbook($audio['audio_ebook']);






		// echo "ANTERIOR: " . $iPrevious . "<Br>";
		// echo "ATUAL: " . $iCurrent . "<Br>";
		// echo "NEXT: " . $iNext . "<Br>";

		if ($ebook) {

			//Next, Previous and Default.

			$audios = $this->audio_model->getProgressCurrentList($ebook_id);

			$iPrevious = "";
			$iCurrent = "";
			$iNext = "";

			foreach ($audios as $key => $value) {

				//Get Current Audio Index
				if ($value->id == $audio_id) {

					$iCurrent = $value->id;
					$iNext = ($key + 1);
					$iPrevious = ($key - 1);
				}
			}

			if ($iNext >= count($audios)) {
				$iNext = -1;
			}

			foreach ($audios as $key => $value) {

				// //Verifying Next Index
				if ($iNext != -1) {
					if ($iNext == $key) {
						$iNext = $value->id;
					}
				}

				//Verifying Previous Index
				if ($iPrevious == $key) {
					$iPrevious = $value->id;
				}
			}

			$data = array(
				'audio' => $audio,
				'chapter' => $chapter,
				'ebook' => $ebook,
				'next' => $iNext,
				'previous' => $iPrevious

			);

			$this->load->view('user/play', $data);
		} else {
			// redirect(base_url('catalogo'));
		}
	}

	public function addProgress()
	{

		$progress_ebook = htmlspecialchars($this->input->post('progress_ebook'));
		$progress_chapter = htmlspecialchars($this->input->post('progress_chapter'));
		$progress_audio = htmlspecialchars($this->input->post('progress_audio'));

		if ($this->audio_model->getProgress($progress_ebook, $progress_chapter, $progress_audio)) {
			echo "ja existe";
		} else {
			$this->audio_model->addProgress($progress_ebook, $progress_chapter, $progress_audio);
			echo "criado";
		}
	}
}
