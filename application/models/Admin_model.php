<?php
class admin_model extends CI_Model
{

    public function SendRecovery($user_email, $user_token) {

        return true;

    }


    
    public function Auth($user_email, $user_password) {

        $this->db->where('user_email', $user_email);
        $this->db->where('user_password', md5($user_password));
        $this->db->where('user_admin', 1);

        return $this->db->get('users')->row_array();

    }

    public function getSupport() {
       
 
    return $this->db->get('config_support')->row_array();

}

    public function updateSupport($support_code) {
       
            $data = array(
                'support_code' => $support_code,
            );

        return $this->db->update('config_support', $data);

    }

    public function authLogin() {

        $actual_link = $_SERVER['REQUEST_URI'];


        if (strpos($actual_link, 'painel/login') !== false ) {

        } else if (strpos($actual_link, 'painel/auth') !== false) {
                    
        
        } else {
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

   

}
?>