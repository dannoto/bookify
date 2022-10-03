<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {
	public function __construct() {

		parent::__construct();
		$this->load->model('register_model');
		$this->load->model('login_model');
		$this->load->model('user_model');
		$this->load->model('email_model');
		$this->load->model('admin_model');
		$this->load->model('category_model');
        $this->load->model('raffles_model');

        $this->load->model('payments_model');


	}

	public function index()
	{
		if ($this->session->userdata('session_admin')){
			redirect(base_url());
		}

		$this->load->view('user/login');
	}


    // Inicio Sorteios
    public function sorteios() {


        $data = array (

        );

        $this->load->view('admin/sorteios');

    }

    public function add_sorteio() {

        if ($_FILES) {

            $uploadPATH = './assets/img/raffles/';
            $uploadNAME = mt_rand().basename($_FILES['raffles_image']['name']);
            $uploadPATHFULL = $uploadPATH.$uploadNAME;
    
            if (move_uploaded_file($_FILES['raffles_image']['tmp_name'], $uploadPATHFULL)) {
                $raffles_image = $uploadNAME;
    
            } else {
                $raffles_image = "";
    
            }
        }

        if ($this->input->post()) {

            $response = array();

            // $raffles_user = $this->session->userdata('session_admin')['admin']; 
            $raffles_user = 1; 
            $raffles_title = htmlspecialchars($this->input->post('raffles_title'));
            $raffles_description = htmlspecialchars($this->input->post('raffles_description'));
            $raffles_image = $raffles_image;
            $raffles_tickets = htmlspecialchars($this->input->post('raffles_tickets'));
            $raffles_tickets_limit = htmlspecialchars($this->input->post('raffles_tickets_limit'));
            $raffles_tickets_value = str_replace(",","", htmlspecialchars($this->input->post('raffles_tickets_value')));
            $raffles_status_publish = htmlspecialchars($this->input->post('raffles_status_publish'));
            $raffles_status_random = 1;
            $raffles_category = htmlspecialchars($this->input->post('raffles_category'));
            $raffles_date = date('d/m/Y');
            $raffles_time = date('H:i:s');

            if ($this->raffles_model->addRaffle($raffles_title, $raffles_description, $raffles_image, $raffles_tickets, $raffles_tickets_limit, $raffles_tickets_value, $raffles_status_publish, $raffles_status_random, $raffles_category, $raffles_date, $raffles_time, $raffles_user) ) {
				$response =  array('status' => 'true', 'message' => 'Sorteio criado com sucesso!');
            }  else {
                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
            }

            print_r(json_encode($response));

            
        }
    }
    
    public function update_sorteio() {

        if ($_FILES) {

            $uploadPATH = './assets/img/raffles/';
            $uploadNAME = mt_rand().basename($_FILES['raffles_image']['name']);
            $uploadPATHFULL = $uploadPATH.$uploadNAME;
    
            if (move_uploaded_file($_FILES['raffles_image']['tmp_name'], $uploadPATHFULL)) {
                $raffles_image = $uploadNAME;
    
            } else {
                $raffles_image = "";
    
            }
        }

        if ($this->input->post()) {

            $response = array();

            // $raffles_user = $this->session->userdata('session_admin')['admin']; 
            $raffles_id = htmlspecialchars($this->input->post('raffles_id'));
            $raffles_user = 1; 
            $raffles_title = htmlspecialchars($this->input->post('raffles_title'));
            $raffles_description = htmlspecialchars($this->input->post('raffles_description'));
            $raffles_image = $raffles_image;
            $raffles_tickets = htmlspecialchars($this->input->post('raffles_tickets'));
            $raffles_tickets_limit = htmlspecialchars($this->input->post('raffles_tickets_limit'));
            $raffles_tickets_value = str_replace(",","", htmlspecialchars($this->input->post('raffles_tickets_value')));
            $raffles_status_publish = htmlspecialchars($this->input->post('raffles_status_publish'));
            $raffles_status_random = 1;
            $raffles_category = htmlspecialchars($this->input->post('raffles_category'));
            $raffles_date = date('d/m/Y');
            $raffles_time = date('H:i:s');

            if ($this->raffles_model->updateRaffle($raffles_id, $raffles_title, $raffles_description, $raffles_image, $raffles_tickets, $raffles_tickets_limit, $raffles_tickets_value, $raffles_status_publish, $raffles_status_random, $raffles_category, $raffles_date, $raffles_time, $raffles_user) ) {
				$response =  array('status' => 'true', 'message' => 'Sorteio atualizado com sucesso!');
            }  else {
                $response =  array('status' => 'false', 'message' => 'Ocorreu um erro inesperado.');
            }

            print_r(json_encode($response));

            
        }
    }


    public function getUpdatePublish() {
        $raffles_status_publish = $this->input->post('raffles_status_publish');
        $raffles_id = $this->input->post('raffles_id');

        

        $raffle = $this->raffles_model->getRaffle($raffles_id);
     


        echo '<option ';  if ( $raffle['raffles_status_publish'] == 1) { echo "selected"; }  echo  ' value="1">Publicado</option>';
        echo '<option ';  if ( $raffle['raffles_status_publish'] == 0) { echo "selected"; }  echo  ' value="0">Rascunho</option>';
        
    }

    public function getUpdateCategory() {

        $raffles_category = $this->input->post('raffles_category');

        echo '<option value="">Escolher Categoria...</option>';
        
        foreach($this->category_model->getCategories() as $c)  {
            
            if ($raffles_category == $c->id) {
                echo '<option selected value="'.$c->id.'">'.$c->raffles_name.'</option>';
            } else {
                echo '<option value="'.$c->id.'">'.$c->raffles_name.'</option>';
            }
        } 

    }

    public function sorteio_resultado($id) {
        $id = htmlspecialchars($id);
        $id = $this->raffles_model->getRaffle($id);

        if ($id) {

            $data = array(
                'winner' => $this->raffles_model->getRaffleWinner($id['id']),
            );
            $this->load->view('admin/sorteio_resultado', $data);

        } else {

            redirect(base_url('painel/sorteios'));
        }
    }


    public function deleteRaffle() {

        $response = array();

        $raffle_id = $this->input->post('raffle_id');

        $tickets_buyed = count($this->payments_model->checkBuyedTickets($raffle_id, null));

        if ($tickets_buyed > 0 ) {

            //Get raffles_buyed amount
            $raffles_buyers = $this->payments_model->getRaffleBuyed($raffle_id);


            foreach ($raffles_buyers as $b) {

                $raffle_user = $b->raffles_user;
                $raffle_amount = $b->raffles_amount;
                $raffle_payment = $b->raffles_payment;

                $user_credit = $this->user_model->getUserById($raffle_user)['user_credit'];
                $this->user_model->updateUserCredits($raffle_user, $raffle_amount, $user_credit);

                $this->payments_model->updateRaffleBuyedStatus($b->id, 1);

                $this->payments_model->updatePaymentStatus($raffle_payment, $b->raffles_user, '4');

            }

            if ($this->raffles_model-> updateRaffleStatusCanceled($raffle_id)){

                $response =  array('status' => 'true', 'message' => 'Sorteio foi cancelado com sucesso. Os pagamentos foram reembolsados em forma de crédito.');
            }


        } else {

            if ($this->raffles_model-> updateRaffleStatusCanceled($raffle_id)){

                $response =  array('status' => 'true', 'message' => 'Sorteio foi cancelado com sucesso.');
            }


        }

        print_r(json_encode($response));


    }
    
    // Fim Sorteios






    public function usuarios() {


        $data = array (

        );

        $this->load->view('admin/sorteios');

    }

    public function pagamentos() {


        $data = array (

        );

        $this->load->view('admin/sorteios');

    }

    public function config_website() {


        $data = array (

        );

        $this->load->view('admin/sorteios');

    }

    public function config_gateways() {


        $data = array (

        );

        $this->load->view('admin/sorteios');

    }

    public function config_marketing() {


        $data = array (

        );

        $this->load->view('admin/sorteios');

    }














	public function auth() {
		if ($this->input->post() ) {

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
