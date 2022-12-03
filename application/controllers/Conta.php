

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conta extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
        $this->load->model('user_model');
        $this->user_model->authControl();
        $this->user_model->authPlan();
        
        $this->load->model('email_model');
		$this->load->model('admin_model');
		$this->load->model('category_model');
        $this->load->model('raffles_model');
        $this->load->model('payments_model');
        $this->load->model('cart_model');
        $this->load->model('plan_model');


	}



    public function perfil() {
        $this->load->view('user/conta/perfil');
    }
    public function seguranca() {
        $this->load->view('user/conta/seguranca');

    }
    public function assinatura() {

        $data = array(
            'plan' => $this->plan_model->getUserCurrentPlan($this->session->userdata('session_user')['id']),
        );
        $this->load->view('user/conta/assinatura', $data);

    }


    // Actions

    public function actUpdatePassword() {
        if ($this->input->post()) {

            $response = array();

            $user_id = $this->session->userdata('session_user')['id'];
            $old_password = md5(htmlspecialchars($this->input->post('old_password')));
            $new_password = htmlspecialchars($this->input->post('new_password'));
            $new_password_confirm = htmlspecialchars($this->input->post('new_password_confirm'));

            $current_password = $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_password'];


            if ($current_password == $old_password) {
                if (strlen($new_password) >=6 ) {

                    if ($new_password == $new_password_confirm ) {

                        if ($this->user_model->updatePassword($user_id, $new_password)) {
                            $response =  array('status' => 'true', 'message' => 'Senha atualizada com sucesso.');

                        } else {
                            $response =  array('status' => 'true', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');

                        }

                    } else {
                        $response =  array('status' => 'true', 'message' => 'Suas senhas não combinam.');

                    }
    
                } else {
                    $response =  array('status' => 'true', 'message' => 'Sua nova senha precisa de no mínmo 6 caracteres.');

                }

            } else {
                $response =  array('status' => 'true', 'message' => 'Suas senha atual está incorreta.');
            }

            print_r(json_encode($response));

        }
    }

    public function actUpdatePerfil() {

        $response = array();

        $user_id = $this->session->userdata('session_user')['id'];
        $user_name = htmlspecialchars($this->input->post('user_name'));
        $user_surname = htmlspecialchars($this->input->post('user_surname'));
        $user_email = htmlspecialchars($this->input->post('user_email'));

        $user_street = htmlspecialchars($this->input->post('user_street'));
        $user_state = htmlspecialchars($this->input->post('user_state'));
        $user_city = htmlspecialchars($this->input->post('user_city'));
        $user_district = htmlspecialchars($this->input->post('user_district'));
        $user_cep = htmlspecialchars($this->input->post('user_cep'));

        $validate_email = $this->register_model->validate_email($user_email) ;

       if ($validate_email == TRUE || $user_email == $this->user_model->getUserById($this->session->userdata('session_user')['id'])['user_email']) {

            if ($this->user_model->updatePerfil($user_id, $user_name, $user_surname, $user_email, $user_street, $user_city, $user_district, $user_state, $user_cep )) {
                $response =  array('status' => 'true', 'message' => 'Perfil atualizada com sucesso.');

            } else {
                $response =  array('status' => 'true', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');

            }

       } else {

            $response =  array('status' => 'true', 'message' => 'Este e-mail já está sendo usado.');

       }

        print_r(json_encode($response));


    }

    public function actUpdateImage() {

        $response = array();

        $user_id = $this->session->userdata('session_user')['id'];

        $user_image = "avatar.png";

        if ($_FILES) {

            $uploadPATH = './assets/img/avatar/';
            $uploadNAME = mt_rand().basename($_FILES['user_image']['name']);
            $uploadPATHFULL = $uploadPATH.$uploadNAME;
    
            if (move_uploaded_file($_FILES['user_image']['tmp_name'], $uploadPATHFULL)) {

                $user_image =  $uploadNAME;

                if ($this->user_model->updateImage($user_id, $user_image)) {
                    $response =  array('status' => 'true', 'message' => 'Imagem atualizada com sucesso.');
    
                } else {
                    $response =  array('status' => 'true', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
    
                }
    
            } else {

                $response =  array('status' => 'true', 'message' => 'Ocorreu um erro inesperado. Tente novamente.');
            }
        }


        redirect(base_url('conta/perfil'));
      
        // print_r(json_encode($response));


    }


}