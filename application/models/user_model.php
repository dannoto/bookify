<?php
class user_model extends CI_Model
{

    public function getUserByEmail($user_email)
    {

        $this->db->where('user_email', $user_email);
        return $this->db->get('users')->row_array();
    }

    public function getUsers()
    {

        return $this->db->get('users')->result();
    }

    public function getUserByToken($user_token)
    {
        $this->db->where('user_token', $user_token);
        return $this->db->get('users')->row_array();
    }

    public function getUserById($user_id)
    {
        $this->db->where('id', $user_id);
        return $this->db->get('users')->row_array();
    }

    public function updateUserCredits($raffle_user, $raffle_amount, $user_credits)
    {

        $this->db->where('id', $raffle_user);

        $data = array(
            'user_credit' => ($raffle_amount + $user_credits),
        );

        return $this->db->update('users', $data);
    }

    public function updateImage($user_id, $user_image)
    {

        $this->db->where('id', $user_id);

        $data = array(
            'user_image' => $user_image,
        );

        return $this->db->update('users', $data);
    }

    public function updatePerfil($user_id, $user_name, $user_surname, $user_email, $user_street, $user_city, $user_district, $user_state, $user_cep)
    {

        $this->db->where('id', $user_id);

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'user_surname' => $user_surname,
            'user_email' => $user_email,
            'user_street' => $user_street,
            'user_city' => $user_city,
            'user_district' => $user_district,
            'user_state' => $user_state,
            'user_cep' => $user_cep,
        );

        return $this->db->update('users', $data);
    }

    public function updateUserAdmin($user_id,  $user_image, $user_name, $user_surname, $user_email, $user_street, $user_city, $user_district, $user_state, $user_cep, $user_plan, $user_status)
    {

        $this->db->where('id', $user_id);

        $data = array(
            'user_name' => $user_name,
            'user_surname' => $user_surname,
            'user_surname' => $user_surname,
            'user_email' => $user_email,
            'user_street' => $user_street,
            'user_city' => $user_city,
            'user_district' => $user_district,
            'user_state' => $user_state,
            'user_cep' => $user_cep,
            'user_plan' => $user_plan,
            'user_status' => $user_status,
            'user_image' =>  $user_image

        );

        return $this->db->update('users', $data);
    }


    public function updatePassword($user_id, $password)
    {
        $this->db->where('id', $user_id);

        $data = array(
            'user_password' => md5($password),
        );
        return $this->db->update('users', $data);
    }

    public function updateToken($user_id)
    {
        $this->db->where('id', $user_id);

        $data = array(
            'user_token' => mt_rand(),
        );
        return $this->db->update('users', $data);
    }



    public function authControl()
    {

        if ($this->session->userdata('session_user')) {

            
        } else {

            redirect(base_url('login'));

        }
    }

    public function authPlan()
    {

        if ($this->session->userdata('session_user')) {

            
            if ($this->getUserById($this->session->userdata('session_user')['id'])['user_plan'] == "0") {
    
                redirect(base_url('planos/escolha'));
    
            } else {
                
            }
        } else {

        }
    }
}
