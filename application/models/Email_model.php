<?php
class email_model extends CI_Model
{

    public function SendRecovery($user_email, $user_token) {

        return true;

    }

    
    public function canceledSubscribe($user, $plan , $cancel_request) {
        return true;
    }

   

}
?>