<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Painel extends CI_Controller
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
        $this->load->model('payments_model');

        $this->load->model('audio_model');
        $this->load->model('ebook_model');
        $this->load->model('chapter_model');
    }

    public function index()
    {
        // if ($this->session->userdata('session_admin')){
        // 	redirect(base_url());
        // }

        $this->load->view('admin/dashboard');
    }


    // Paginas
    public function usuarios()
    {


        $data = array();

        $this->load->view('admin/usuarios');
    }

    public function ebooks_publicar()
    {

        $data = array(
                'categorias' => $this->category_model->getCategories(),
                'features' => $this->category_model->getFeatures()
        );
        
        $this->load->view('admin/ebooks/publicar', $data);
    }
    
    public function ebooks_editar($ebook_id)
    {

        if (strlen($ebook_id) > 0) {

            if ($this->ebook_model->getEbook($ebook_id)) {

                $data = array(
                    'ebook' => $this->ebook_model->getEbook($ebook_id),
                    'categorias' => $this->category_model->getCategories(),
                    'features' => $this->category_model->getFeatures()
                );
    
                $this->load->view('admin/ebooks/editar', $data);


            } else {
                redirect(base_url('painel/ebooks_lista'));
            }

        } else {

            redirect(base_url('painel/ebooks_lista'));
        }


    }

    public function ebooks_lista()
    {


        $data = array(
            'ebooks' => $this->ebook_model->getEbooksAdmin(),

        );

        $this->load->view('admin/ebooks/lista', $data);
    }

    public function ebooks_categorias()
    {

        $this->load->view('admin/ebooks/categorias');
    }

    // Paginas



    // Actions Ebook

    public function actAddEbook()
    {

        $response = array();

        if ($this->input->post()) {

            $ebook_title = htmlspecialchars($this->input->post('ebook_title'));
            $ebook_description = htmlspecialchars($this->input->post('ebook_description'));
            $ebook_image = "";
            $ebook_tags = htmlspecialchars($this->input->post('ebook_tags'));
            $ebook_status = htmlspecialchars($this->input->post('ebook_status'));
            $ebook_precificacao = htmlspecialchars($this->input->post('ebook_precificacao'));
            $ebook_category = htmlspecialchars($this->input->post('ebook_category'));
            $ebook_featured = htmlspecialchars($this->input->post('ebook_featured'));
            $ebook_publisher = htmlspecialchars($this->input->post('ebook_publisher'));
            $ebook_author = htmlspecialchars($this->input->post('ebook_author'));


            if ($_FILES) {

                $hash = md5($ebook_category);
                $uploadPATH = './assets/img/ebooks/'.$hash."/";
                $uploadNAME = mt_rand() . basename($_FILES['ebook_image']['name']) ;
                $uploadPATHFULL = $uploadPATH . str_replace(" ","", $uploadNAME);

                $uploadPATHFULLdatabase = str_replace(".","", $uploadPATH). str_replace(" ","", $uploadNAME);

                if (!file_exists($uploadPATH)) {
                    mkdir($uploadPATH, 0777, true);			
                }

                if (move_uploaded_file($_FILES['ebook_image']['tmp_name'], $uploadPATHFULL )) {

                    $ebook_image = $uploadPATHFULLdatabase;

                } else {

                    $ebook_image =  "/assets/img/ebooks/default.png";
                }
            } else {

                $ebook_image =  "/assets/img/ebooks/default.png";
            }

            $ebook_created = $this->ebook_model->addEbook($ebook_title, $ebook_description, $ebook_image, $ebook_tags, $ebook_status, $ebook_precificacao, $ebook_category, $ebook_featured, $ebook_publisher, $ebook_author);
           
            if ($ebook_created) {

                $response =  array('status' => 'true', 'message' => 'Audiobook criado com sucesso. Comece a editar!', 'ebook_id' => $ebook_created);
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function actUpdateEbook()
    {

        $response = array();

        if ($this->input->post()) {

            $ebook_id = htmlspecialchars($this->input->post('ebook_id'));
            $ebook_title = htmlspecialchars($this->input->post('ebook_title'));
            $ebook_description = htmlspecialchars($this->input->post('ebook_description'));
            $ebook_image = "";
            $ebook_tags = htmlspecialchars($this->input->post('ebook_tags'));
            $ebook_status = htmlspecialchars($this->input->post('ebook_status'));
            $ebook_precificacao = htmlspecialchars($this->input->post('ebook_precificacao'));
            $ebook_category = htmlspecialchars($this->input->post('ebook_category'));
            $ebook_featured = htmlspecialchars($this->input->post('ebook_featured'));
            $ebook_publisher = htmlspecialchars($this->input->post('ebook_publisher'));
            $ebook_author = htmlspecialchars($this->input->post('ebook_author'));


            if ($_FILES) {

                $hash = md5($ebook_category);
                $uploadPATH = './assets/img/ebooks/'.$hash."/";
                $uploadNAME = mt_rand() . basename($_FILES['ebook_image']['name']) ;
                $uploadPATHFULL = $uploadPATH . str_replace(" ","", $uploadNAME);

                $uploadPATHFULLdatabase = str_replace(".","", $uploadPATH). str_replace(" ","", $uploadNAME);

                if (!file_exists($uploadPATH)) {
                    mkdir($uploadPATH, 0777, true);			
                }

                if (move_uploaded_file($_FILES['ebook_image']['tmp_name'], $uploadPATHFULL )) {

                    $ebook_image = $uploadPATHFULLdatabase;

                } else {

                    $ebook_image =  "/assets/img/ebooks/default.png";
                }

            } else {

                $ebook_image =  "";
            }


            if ($this->ebook_model->updateEbook($ebook_id, $ebook_title, $ebook_description, $ebook_image, $ebook_tags, $ebook_status, $ebook_precificacao, $ebook_category, $ebook_featured, $ebook_publisher, $ebook_author)) {

                $response =  array('status' => 'true', 'message' => 'Audiobook atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function deleteEbook()
    {

        if ($this->input->post()) {

            $ebook_id = htmlspecialchars($this->input->post('ebook_id'));

            if ($this->ebook_model->deleteEbook($ebook_id)) {

                $response =  array('status' => 'true', 'message' => 'Audiobook excluido com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }
    // Actions Ebook


    // Actions Chapter

    public function addChaper()
    {
        $response = array();

        if ($this->input->post()) {

            $chapter_title = htmlspecialchars($this->input->post('chapter_title'));
            $chapter_ebook = htmlspecialchars($this->input->post('chapter_ebook'));
            $chapter_description = htmlspecialchars($this->input->post('chapter_description'));

            if ($this->ebook_model->addChapter($chapter_title, $chapter_ebook, $chapter_description)) {

                $response =  array('status' => 'true', 'message' => 'Capítulo criado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function updateChapter()
    {
        $response = array();

        if ($this->input->post()) {

            $chapter_id = htmlspecialchars($this->input->post('chapter_id'));
            $chapter_title = htmlspecialchars($this->input->post('chapter_title'));
            $chapter_description = htmlspecialchars($this->input->post('chapter_description'));

            if ($this->ebook_model->updateChapter($chapter_id, $chapter_title, $chapter_description)) {

                $response =  array('status' => 'true', 'message' => 'Capítulo atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function deleteChapter()
    {
        $response = array();

        if ($this->input->post()) {

            $chapter_id = htmlspecialchars($this->input->post('chapter_id'));

            if ($this->ebook_model->deleteChapter($chapter_id)) {

                if ($this->audio_model->deleteAudiosByChapter($chapter_id)) {

                    $response =  array('status' => 'true', 'message' => 'Capítulo excluído com sucesso!');

                } else {

                    $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');

                }


            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }
    //Actions Chaper


    // Actions Audio
    public function addAudio()
    {
        $response = array();

        if ($this->input->post()) {

            $audio_chapter = htmlspecialchars($this->input->post('audio_chapter'));
            $audio_ebook = htmlspecialchars($this->input->post('audio_ebook'));
            $audio_title = htmlspecialchars($this->input->post('audio_title'));
            $audio_description = htmlspecialchars($this->input->post('audio_description'));
            $audio_file = "";
            $audio_duration = htmlspecialchars($this->input->post('audio_duration'));

            if ($_FILES) {

                $uploadPATH = './assets/img/audios/';
                $uploadNAME = mt_rand() . basename($_FILES['audio_file']['name']);
                $uploadPATHFULL = $uploadPATH . $uploadNAME;

                if (move_uploaded_file($_FILES['audio_file']['tmp_name'], $uploadPATHFULL)) {

                    $audio_file =  $uploadNAME;
                } else {

                    $audio_file =  "";
                }
            } else {

                $audio_file =  "";
            }


            if ($this->ebook_model->addAudio($audio_chapter, $audio_ebook, $audio_title, $audio_description, $audio_file, $audio_duration)) {

                $response =  array('status' => 'true', 'message' => 'Audio criado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function updateAudio()
    {
        $response = array();

        if ($this->input->post()) {

            $audio_id = htmlspecialchars($this->input->post('audio_id'));
            $audio_chapter = htmlspecialchars($this->input->post('audio_chapter'));
            $audio_title = htmlspecialchars($this->input->post('audio_title'));
            $audio_description = htmlspecialchars($this->input->post('audio_description'));
            $audio_file = "";
            $audio_duration = htmlspecialchars($this->input->post('audio_duration'));

            if ($_FILES) {

                $uploadPATH = './assets/img/audios/';
                $uploadNAME = mt_rand() . basename($_FILES['audio_file']['name']);
                $uploadPATHFULL = $uploadPATH . $uploadNAME;

                if (move_uploaded_file($_FILES['audio_file']['tmp_name'], $uploadPATHFULL)) {

                    $audio_file =  $uploadNAME;
                } else {

                    $audio_file =  "";
                }
            } else {

                $audio_file =  "";
            }


            if ($this->ebook_model->updateAudio($audio_id, $audio_chapter, $audio_title, $audio_description, $audio_file, $audio_duration)) {

                $response =  array('status' => 'true', 'message' => 'Audio atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function deleteAudio() 
    {

        if ($this->input->post()) {

            $audio_id = htmlspecialchars($this->input->post('audio_id'));

            if ($this->ebook_model->deleteAudio($audio_id)) {

                $response =  array('status' => 'true', 'message' => 'Audio excluido com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    // Actions Audio



    // Actions DOM

    public function getChaptersDOM() 
    {

        if ($this->input->post()) {

            $ebook_id = htmlspecialchars($this->input->post('ebook_id'));

            $chapters = $this->chapter_model->getChaptersByEbook($ebook_id);


            foreach ($chapters as $c) 
            {
                // Chaperts

                //Audios
                foreach ($this->audio_model->getAudiosByChapters($c->id) as $a) 
                {
                                           
                }

            }


        }

    }

    //Actions DOM

























    public function auth()
    {
        if ($this->input->post()) {

            $response = array();

            $user_email = htmlspecialchars($this->input->post('user_email'));
            $user_password = htmlspecialchars($this->input->post('user_password'));

            $auth = $this->login_model->Auth($user_email, $user_password);

            if ($auth) {

                $this->session->set_userdata('session_admin', $auth);

                $response =  array('status' => 'true', 'message' => 'Logado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Suas credenciais estão incorretas.');
            }

            print_r(json_encode($response));
        }
    }
}
