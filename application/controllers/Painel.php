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
        $this->load->model('config_model');

        $this->load->model('audio_model');
        $this->load->model('ebook_model');
        $this->load->model('chapter_model');
        $this->load->model('plan_model');
    }

    public function index()
    {
        // if ($this->session->userdata('session_admin')){
        // 	redirect(base_url());
        // }

        $this->load->view('admin/dashboard');
    }


    // Paginas

    public function updateGateway () {

        $response = array();

        $gateway_public = htmlspecialchars($this->input->post('gateway_public'));
        $gateway_secret = htmlspecialchars($this->input->post('gateway_secret'));

        if ( $this->config_model->updateConfigPayment($gateway_public, $gateway_secret)) {
            $response =  array('status' => 'true', 'message' => 'Chaves atualizadas com sucesso.');
        }   else {
            $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
        }
    


        print_r(json_encode($response));

    }

    public function configuracoes_gateways()
    {

        $data = array(
            'gateway' => $this->config_model->getGatewayPayment(),
        );

        $this->load->view('admin/configuracoes', $data);
    }

    public function planos()
    {


        $data = array(
            'planos' => $this->plan_model->getPlans(),
        );

        $this->load->view('admin/planos', $data);
    }
    public function usuarios()
    {


        $data = array(
            'usuarios' => $this->user_model->getUsers(),
        );

        $this->load->view('admin/usuarios/lista', $data);
    }

    public function usuarios_editar($user_id)
    {

        $user = $this->user_model->getUserById(htmlspecialchars($user_id));

        if ($user) {
        } else {
            redirect(base_url('painel/usuarios'));
        }

        $data = array(
            'usuario' => $this->user_model->getUserById(htmlspecialchars($user_id)),
            'planos' => $this->plan_model->getPlans(),

        );

        $this->load->view('admin/usuarios/editar', $data);
    }

    public function actUpdateUser()
    {

        $response = array();

        if ($this->input->post()) {

            $user_id = htmlspecialchars($this->input->post('user_id'));
            $user_name = htmlspecialchars($this->input->post('user_name'));
            $user_surname = htmlspecialchars($this->input->post('user_surname'));
            $user_image = "";
            $user_email = htmlspecialchars($this->input->post('user_email'));
            $user_status = htmlspecialchars($this->input->post('user_status'));
            $user_plan = htmlspecialchars($this->input->post('user_plan'));
            $user_street = htmlspecialchars($this->input->post('user_street'));
            $user_city = htmlspecialchars($this->input->post('user_city'));
            $user_state = htmlspecialchars($this->input->post('user_state'));
            $user_district = htmlspecialchars($this->input->post('user_district'));
            $user_cep = htmlspecialchars($this->input->post('user_cep'));


            if ($_FILES) {

                $uploadPATH = './assets/img/avatar/';
                $uploadNAME = mt_rand() . basename($_FILES['user_image']['name']);
                $uploadPATHFULL = $uploadPATH . str_replace(" ", "", $uploadNAME);

                if (move_uploaded_file($_FILES['user_image']['tmp_name'], $uploadPATHFULL)) {

                    $user_image = $uploadNAME;
                } else {

                    $user_image =  "default.png";
                }
            } else {

                $user_image =  "default.png";
            }


            if ($this->user_model->updateUserAdmin($user_id,  $user_image, $user_name, $user_surname, $user_email, $user_street, $user_city, $user_district, $user_state, $user_cep, $user_plan, $user_status)) {

                $response =  array('status' => 'true', 'message' => 'Usuário atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
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
            'categorias' => $this->category_model->getCategories(),
            'features' => $this->category_model->getFeatures()

        );

        $this->load->view('admin/ebooks/lista', $data);
    }

    public function ebooks_categorias()
    {
        $data = array(
            'ebooks' => $this->ebook_model->getEbooksAdmin(),
            'categorias' => $this->category_model->getCategories(),
        );

        $this->load->view('admin/ebooks/categorias', $data);
    }

    public function ebooks_features()
    {
        $data = array(
            'ebooks' => $this->ebook_model->getEbooksAdmin(),
            'features' => $this->category_model->getFeatures()
        );

        $this->load->view('admin/ebooks/features', $data);
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
                $uploadPATH = './assets/img/ebooks/' . $hash . "/";
                $uploadNAME = mt_rand() . basename($_FILES['ebook_image']['name']);
                $uploadPATHFULL = $uploadPATH . str_replace(" ", "", $uploadNAME);

                $uploadPATHFULLdatabase = str_replace(".", "", $uploadPATH) . str_replace(" ", "", $uploadNAME);

                if (!file_exists($uploadPATH)) {
                    mkdir($uploadPATH, 0777, true);
                }

                if (move_uploaded_file($_FILES['ebook_image']['tmp_name'], $uploadPATHFULL)) {

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
                $uploadPATH = './assets/img/ebooks/' . $hash . "/";
                $uploadNAME = mt_rand() . basename($_FILES['ebook_image']['name']);
                $uploadPATHFULL = $uploadPATH . str_replace(" ", "", $uploadNAME);

                $uploadPATHFULLdatabase = str_replace(".", "", $uploadPATH) . str_replace(" ", "", $uploadNAME);

                if (!file_exists($uploadPATH)) {
                    mkdir($uploadPATH, 0777, true);
                }

                if (move_uploaded_file($_FILES['ebook_image']['tmp_name'], $uploadPATHFULL)) {

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

            if ($this->chapter_model->addChapter($chapter_title, $chapter_ebook, $chapter_description)) {

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

            if ($this->chapter_model->updateChapter($chapter_id, $chapter_title, $chapter_description)) {

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

            if ($this->chapter_model->deleteChapter($chapter_id)) {

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








    // Actions Category 

    public function addCategory()
    {
        $response = array();

        if ($this->input->post()) {

            $category_name = htmlspecialchars($this->input->post('category_name'));
            $category_description = htmlspecialchars($this->input->post('category_description'));

            if ($this->category_model->addCategory($category_name, $category_description)) {

                $response =  array('status' => 'true', 'message' => 'Capítulo criado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function updateCategory()
    {
        $response = array();

        if ($this->input->post()) {
            $category_id = htmlspecialchars($this->input->post('category_id'));
            $category_name = htmlspecialchars($this->input->post('category_name'));
            $category_description = htmlspecialchars($this->input->post('category_description'));


            if ($this->category_model->updateCategory($category_id, $category_name, $category_description)) {

                $response =  array('status' => 'true', 'message' => 'Capítulo atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function deleteCategory()
    {
        $response = array();

        if ($this->input->post()) {

            $category_id = htmlspecialchars($this->input->post('category_id'));

            if ($this->category_model->deleteCategory($category_id)) {

                $response =  array('status' => 'true', 'message' => 'Categoria excluída com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }
    //Actions Category 



    // Actions Category 

    public function addPlan()
    {
        $response = array();

        if ($this->input->post()) {

            $plan_name = htmlspecialchars($this->input->post('plan_name'));
            $plan_description = htmlspecialchars($this->input->post('plan_description'));
            $plan_price = htmlspecialchars($this->input->post('plan_price'));
            $plan_type = htmlspecialchars($this->input->post('plan_type'));

            $plan_limit_library = htmlspecialchars($this->input->post('plan_limit_library'));
            $plan_limit_quantity = htmlspecialchars($this->input->post('plan_limit_quantity'));
            $plan_limit_free = htmlspecialchars($this->input->post('plan_limit_free'));
            $plan_limit_premium = htmlspecialchars($this->input->post('plan_limit_premium'));

            $plan_gateway_id = htmlspecialchars($this->input->post('plan_gateway_id'));

            if ($this->plan_model->addPlan($plan_name, $plan_description, $plan_price, $plan_type, $plan_limit_library, $plan_limit_quantity, $plan_limit_free, $plan_limit_premium, $plan_gateway_id)) {

                $response =  array('status' => 'true', 'message' => 'Plano criado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function updatePlan()
    {
        $response = array();

        if ($this->input->post()) {
            $plan_id = htmlspecialchars($this->input->post('plan_id'));
            $plan_name = htmlspecialchars($this->input->post('plan_name'));
            $plan_description = htmlspecialchars($this->input->post('plan_description'));
            $plan_price = htmlspecialchars($this->input->post('plan_price'));
            $plan_type = htmlspecialchars($this->input->post('plan_type'));

            $plan_limit_library = htmlspecialchars($this->input->post('plan_limit_library'));
            $plan_limit_quantity = htmlspecialchars($this->input->post('plan_limit_quantity'));
            $plan_limit_free = htmlspecialchars($this->input->post('plan_limit_free'));
            $plan_limit_premium = htmlspecialchars($this->input->post('plan_limit_premium'));

            $plan_gateway_id = htmlspecialchars($this->input->post('plan_gateway_id'));

            $plan_price = str_replace(".", "", $plan_price);
            $plan_price = str_replace(",", ".", $plan_price);


            if ($this->plan_model->updatePlan($plan_id, $plan_name, $plan_description, $plan_price, $plan_type, $plan_limit_library, $plan_limit_quantity, $plan_limit_free, $plan_limit_premium, $plan_gateway_id)) {

                $response =  array('status' => 'true', 'message' => 'Plano atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function deletePlan()
    {
        $response = array();

        if ($this->input->post()) {

            $plan_id = htmlspecialchars($this->input->post('plan_id'));

            if ($this->plan_model->deletePlan($plan_id)) {

                $response =  array('status' => 'true', 'message' => 'Plano excluído com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }
    //Actions Plan 



    // Actions Category 

    public function addFeatures()
    {
        $response = array();

        if ($this->input->post()) {

            $featured_name = htmlspecialchars($this->input->post('featured_name'));
            $featured_description = htmlspecialchars($this->input->post('featured_description'));

            if ($this->category_model->addFeatures($featured_name, $featured_description)) {

                $response =  array('status' => 'true', 'message' => 'Capítulo criado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function updateFeatures()
    {
        $response = array();

        if ($this->input->post()) {
            $featured_id = htmlspecialchars($this->input->post('featured_id'));
            $featured_name = htmlspecialchars($this->input->post('featured_name'));
            $featured_description = htmlspecialchars($this->input->post('featured_description'));


            if ($this->category_model->updateFeatures($featured_id, $featured_name, $featured_description)) {

                $response =  array('status' => 'true', 'message' => 'Capítulo atualizado com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }

    public function deleteFeatures()
    {
        $response = array();

        if ($this->input->post()) {

            $featured_id = htmlspecialchars($this->input->post('featured_id'));

            if ($this->category_model->deleteFeatures($featured_id)) {

                $response =  array('status' => 'true', 'message' => 'Categoria excluída com sucesso!');
            } else {

                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }


            print_r(json_encode($response));
        }
    }
    //Features Category 


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


            //Convert to minutes
            $i = explode(":",$audio_duration);
            $m = $i[0];
            $s = ($i[1] / 60);
            $audio_duration = round(($m + $s), 2);

            if ($_FILES) {

                $hash = md5($audio_ebook);
                $uploadPATH = './assets/audios/' . $hash . "/";
                $uploadNAME = mt_rand() . basename($_FILES['audio_file']['name']);
                $uploadPATHFULL = $uploadPATH . str_replace(" ", "", $uploadNAME);

                $uploadPATHFULLdatabase = str_replace(".", "", $uploadPATH) . str_replace(" ", "", $uploadNAME);

                if (!file_exists($uploadPATH)) {
                    mkdir($uploadPATH, 0777, true);
                }

                if (move_uploaded_file($_FILES['audio_file']['tmp_name'], $uploadPATHFULL)) {

                    $audio_file = $uploadPATHFULLdatabase;
                } else {

                    $audio_file =  "";
                }

            } else {

                $audio_file =  "";
            }


            if ($this->audio_model->addAudio($audio_chapter, $audio_ebook, $audio_title, $audio_description, $audio_file, $audio_duration)) {


                // update chapter duration
                $this->chapter_model->increaseChapterDuration($audio_chapter, $audio_duration);

                // increase ebook duration
                $this->ebook_model->increaseEbookDuration($audio_ebook, $audio_duration);

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
            $audio_ebook = htmlspecialchars($this->input->post('audio_ebook'));
            $audio_title = htmlspecialchars($this->input->post('audio_title'));
            $audio_description = htmlspecialchars($this->input->post('audio_description'));
            $audio_file = "";
            $audio_duration = htmlspecialchars($this->input->post('audio_duration'));

             //Convert to minutes
             $i = explode(":",$audio_duration);
             $m = $i[0];
             $s = ($i[1] / 60);
             $audio_duration = round(($m + $s), 2);
             if ($_FILES) {

                $hash = md5($audio_ebook);
                $uploadPATH = './assets/audios/' . $hash . "/";
                $uploadNAME = mt_rand() . basename($_FILES['audio_file']['name']);
                $uploadPATHFULL = $uploadPATH . str_replace(" ", "", $uploadNAME);

                $uploadPATHFULLdatabase = str_replace(".", "", $uploadPATH) . str_replace(" ", "", $uploadNAME);

                if (!file_exists($uploadPATH)) {
                    mkdir($uploadPATH, 0777, true);
                }

                if (move_uploaded_file($_FILES['audio_file']['tmp_name'], $uploadPATHFULL)) {

                    $audio_file = $uploadPATHFULLdatabase;
                } else {

                    $audio_file =  "";
                }

            } else {

                $audio_file =  "";
            }

            $old_audio_duration = $this->audio_model->getAudio($audio_id)['audio_duration'];
            $this->chapter_model->decreaseChapterDuration($audio_chapter, $old_audio_duration);
            $this->ebook_model->decreaseEbookDuration($audio_ebook, $old_audio_duration);



            if ($this->audio_model->updateAudio($audio_id, $audio_chapter, $audio_title, $audio_description, $audio_file, $audio_duration)) {

                // update chapter duration
                $this->chapter_model->increaseChapterDuration($audio_chapter, $audio_duration);

                // increase ebook duration
                $this->ebook_model->increaseEbookDuration($audio_ebook, $audio_duration);

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

            $audio = $this->audio_model->getAudio($audio_id);

          

             // update chapter duration
             $this->chapter_model->decreaseChapterDuration($audio['audio_chapter'], $audio['audio_duration']);

             // decrease ebook duration
             $this->ebook_model->decreaseEbookDuration($audio['audio_ebook'],  $audio['audio_duration']);


            if ($this->audio_model->deleteAudio($audio_id)) {

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


            foreach ($chapters as $c) {
                // Chaperts

                //Audios
                foreach ($this->audio_model->getAudiosByChapters($c->id) as $a) {
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
