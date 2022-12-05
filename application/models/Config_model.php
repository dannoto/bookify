<?php
class config_model extends CI_Model
{


    public function updateConfigPayment($gateway_public, $gateway_secret)
    {

        $data = array(
            'gateway_public' => $gateway_public,
            'gateway_secret' => $gateway_secret
        );

        return $this->db->update('config_gateway',$data);
    }

    public function getGatewayPayment() {
        return $this->db->get('config_gateway')->row_array();
    }

    //Design

    public function getConfigDesign(){
        return $this->db->get('config_design')->row_array();
    }


    public function getConfigEmail(){
        return $this->db->get('config_email')->row_array();

    }
}
