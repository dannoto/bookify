<?php
class admin_model extends CI_Model
{

    public function SendRecovery($user_email, $user_token) {

        return true;

    }


    public function authLogin() {
        if ($this->session->userdata('session_admin')) {

            if ($this->user_model->getUserById($this->session->userdata('session_admin')['id'])['user_admin'] == 1) {

                
            }  else {

                redirect(base_url('painel/login'));
            }

        } else {
            redirect(base_url('painel/login'));
        }
    }

   

}
?>