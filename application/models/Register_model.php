<?php
class register_model extends CI_Model

{

    public function addUser($user_name, $user_surname, $user_email, $user_password, $user_origin) {

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'user_email' => $user_email,
            'user_password' => md5($user_password),
            'user_date' => date('d-m-Y'),
            'user_time' => date('H:i:s'),
            'user_refer' => mt_rand(),
            'user_origin' => $user_origin,
            'user_plan' => 0,
            'user_status' => 1,
            'user_token' => mt_rand(),
            'user_image' => 'default.png'
        ); 


        return $this->db->insert('users', $data);

    }


    public function validate_document ($user_cpf) {

        $this->db->where('user_cpf', $user_cpf);
        $data = $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

    public function validate_cpf ($cpf) {

            // Extrai somente os números
            $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
            // Verifica se foi informado todos os digitos corretamente
            if (strlen($cpf) != 11) {
                return false;
            }

            // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
            if (preg_match('/(\d)\1{10}/', $cpf)) {
                return false;
            }

            // Faz o calculo para validar o CPF
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return false;
                }
            }
            return true;
    }


    public function validate_banned_document ($user_cpf) {
        
        $this->db->where('user_cpf', $user_cpf);
        $this->db->where('user_status', 0);
        $data = $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

    public function validate_email($user_email) {

        $this->db->where('user_email', $user_email);
        $data = $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

    public function validate_phone ($user_phone) {

        $this->db->where('user_phone', $user_phone);
        $data =  $this->db->get('users')->row_array();

        if ($data) {
            return false;
        } else {
            return true;
        }
    }

 



    public function getUserIP() {

   
        //whether ip is from the share internet  
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  

            $ip = $_SERVER['HTTP_CLIENT_IP'];  

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR']; 

        } else{  

            $ip = $_SERVER['REMOTE_ADDR'];  

        }  

        return $ip;  
    }      
}

