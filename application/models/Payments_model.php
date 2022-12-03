<?php
class payments_model extends CI_Model
{


    function __construct(){ 
        $this->userTbl        = 'users'; 
        $this->planTbl    = 'users_plans'; 
        $this->subscripTbl    = 'users_subscriptions'; 
    } 
     
    /* 
     * Update user data to the database 
     * @param data array 
     * @param id specific user 
     */ 
    public function updateUser($data, $id){ 
        $update = $this->db->update($this->userTbl, $data, array('id' => $id)); 
        return $update?true:false; 
    } 
     
    /* 
     * Fetch order data from the database 
     * @param id returns a single record 
     */ 
    public function getSubscription($id){ 
        $this->db->select('s.*, p.name as plan_name, p.price as plan_price, p.currency as plan_price_currency, p.interval'); 
        $this->db->from($this->subscripTbl.' as s'); 
        $this->db->join($this->planTbl.' as p', 'p.id = s.plan_id', 'left'); 
        $this->db->where('s.id', $id); 
        $query  = $this->db->get(); 
        return ($query->num_rows() > 0)?$query->row_array():false; 
    } 
     
    /* 
     * Insert subscription data in the database 
     * @param data array 
     */ 

    public function addPayment($data) {
        return $this->db->insert('users_payments',$data);
        // return $this->db->insert_id();
    }

    public function insertSubscription($data){ 
        // $insert = $this->db->insert($this->subscripTbl,$data); 
        // return $insert?$this->db->insert_id():false; 

         $this->db->insert('users_subscriptions',$data);
         return $this->db->insert_id();
    } 
     
    /* 
     * Fetch plans data from the database 
     * @param id returns a single record if specified, otherwise all records 
     */ 
    public function getPlans($id = ''){ 
        // $this->db->select('*'); 
        // $this->db->from($this->planTbl); 
        // if($id){ 
        //     $this->db->where('id', $id); 
        //     $query  = $this->db->get(); 
        //     $result = ($query->num_rows() > 0)?$query->row_array():array(); 
        // }else{ 
        //     $this->db->order_by('id', 'asc'); 
        //     $query  = $this->db->get(); 
        //     $result = ($query->num_rows() > 0)?$query->result_array():array(); 
        // } 
         
        // return !empty($result)?$result:false; 
        $this->db->where('plan_delete_status', 1);
        return $this->db->get('users_plans');
    } 
    // public function addTicketBuyed($ticket_raffle, $ticket_number, $ticket_user, $ticket_date, $ticket_time, $ticket_payment_id, $ticket_payment_type) {

    //     $data = array(
    //         'ticket_raffle' => $ticket_raffle,
    //         'ticket_number' => $ticket_number,
    //         'ticket_user' => $ticket_user,
    //         'ticket_date' => $ticket_date,
    //         'ticket_time' => $ticket_time,
    //         'ticket_payment_id' => $ticket_payment_id,
    //         'ticket_payment_type' => $ticket_payment_type
    //     );

    //     return $this->db->insert('raffles_tickets_buyed', $data);

    // }
    
    
    // public function updatePaymentStatus($raffle_payment,$raffle_user, $status) {

    //     $this->db->where('id',$raffle_payment);
    //     $this->db->where('payments_user',$raffle_user);

    //     $data = array(
    //         'payments_status' => $status
    //     );

    //     $this->db->update('payments', $data);

    // }

    // public function getRaffleBuyed($raffle_id) {
    //     $this->db->where('raffles_id', $raffle_id);
    //     return $this->db->get('raffles_buyed')->result();
    // }

    // public function updateRaffleBuyedStatus($buyed_id) {
    //     $this->db->where('id', $buyed_id,);

    //     $data = array (
    //         'raffles_status' => 1,
    //     );

        
    //     $this->db->update('raffles_buyed', $data);

    // }

    // public function checkBuyedProfile($raffles_id, $raffles_user ) {
    //     $this->db->order_by('id','desc');

    //     if ($raffles_id !== null) {
    //         $this->db->where('raffles_id', $raffles_id,);

    //     }

    //     if ($raffles_user !== null) {
    //         $this->db->where('raffles_user', $raffles_user,);
    //     }
       

    //     return $this->db->get('raffles_buyed')->result();

    // }

    // public function checkBuyed($raffles_id, $raffles_user ) {
    //     $this->db->order_by('id','desc');

    //     if ($raffles_id !== null) {
    //         $this->db->where('raffles_id', $raffles_id,);

    //     }

    //     if ($raffles_user !== null) {
    //         $this->db->where('raffles_user', $raffles_user,);
    //     }
       

    //     return $this->db->get('raffles_buyed')->row_array();

    // }

    // public function isMineTicket($raffles_id, $raffles_ticket_number, $ticket_user) {
    //     $this->db->where('ticket_raffle', $raffles_id);
    //     $this->db->where('ticket_user', $ticket_user);
    //     $this->db->where('ticket_number',$raffles_ticket_number);

    //     return $this->db->get('raffles_tickets_buyed')->row_array();
    // }

    // public function isTicketBuyed($raffles_id, $raffles_ticket_number) {
    //     $this->db->where('ticket_raffle', $raffles_id);
    //     $this->db->where('ticket_number',$raffles_ticket_number);

    //     return $this->db->get('raffles_tickets_buyed')->row_array();

    // }

    

    // public function isTicketInCart($raffles_id, $raffles_ticket_number) {

    //     $this->db->where('cart_raffle', $raffles_id);
    //     $this->db->where('cart_ticket',$raffles_ticket_number);

    //     return $this->db->get('cart_tickets')->row_array();

    // }

    // public function checkBuyedTickets($ticket_raffle, $ticket_user ) {

    //     $this->db->order_by('id','desc');

    //     if ($ticket_raffle !== null) {
    //         $this->db->where('ticket_raffle', $ticket_raffle,);

    //     }

    //     if ($ticket_user !== null) {
    //         $this->db->where('ticket_user', $ticket_user,);

    //     }

    //     return $this->db->get('raffles_tickets_buyed')->result();

    // }

    // public function getUserByWinTicket($raffle_id, $ticket_sorteado) {

    //     $this->db->where('ticket_raffle', $raffle_id,);
    //     $this->db->where('ticket_number', $ticket_sorteado,);

    //     $data =  $this->db->get('raffles_tickets_buyed')->row_array();


    //     return $data['ticket_user'];


    // }

    // public function checkCartTickets($cart_raffle, $cart_user ) {

    //     $this->db->order_by('id','desc');

    //     if ($cart_raffle !== null) {
    //         $this->db->where('cart_raffle', $cart_raffle,);

    //     }

    //     if ($cart_user !== null) {
    //         $this->db->where('cart_user', $cart_user,);

    //     }

    //     return $this->db->get('cart_tickets')->result();

    // }

    // public function updateRafflesBuyed($raffles_id, $raffles_payment, $raffles_amount, $old_amount, $raffles_user ) {

    //     $raffles_amount = $raffles_amount + $old_amount;

    //     $this->db->where('raffles_user', $raffles_user,);
    //     $this->db->where('raffles_id', $raffles_id,);


    //     $data = array(
          
    //         'raffles_data' => date('d-m-Y'),
    //         'raffles_time' => date('H:i:s'),
    //         'raffles_payment' => $raffles_payment,
    //         'raffles_amount' => $raffles_amount,
      
    //     );
       
    //     return $this->db->insert('raffles_buyed', $data);
    // }

    // public function addPayment($payments_raffle, $payments_amount, $payments_status,$payments_user, $payments_gateway,  $payments_type) {

    //     $data = array(
    //         'payments_raffle' => $payments_raffle,
    //         'payments_amount' => $payments_amount,
    //         'payments_status' => $payments_status,
    //         'payments_user' => $payments_user,
    //         'payments_date' => date('d-m-Y'),
    //         'payments_time' => date('H:i:s'),
    //         'payments_gateway' => $payments_gateway,
    //         'payment_type' => $payments_type,
    //     );

    //      $this->db->insert('payments', $data);
    //      return $this->db->insert_id();


    // }
    // public function addRafflesBuyed($raffles_id, $raffles_payment, $raffles_amount,  $raffles_user, $raffles_data, $raffles_time, $raffles_status) {

    //     $data = array(
    //         'raffles_id' => $raffles_id,
    //         'raffles_user' => $raffles_user,
    //         'raffles_data' => $raffles_data,
    //         'raffles_time' => $raffles_time,
    //         'raffles_payment' => $raffles_payment,
    //         'raffles_amount' => $raffles_amount,
    //         'raffles_status' => $raffles_status,
    //     );
       
    //     return $this->db->insert('raffles_buyed', $data);

    // }

    // public function decreaseCredit($cart_user, $due_amount, $credit) {

    //     $new_amount = ($credit - $due_amount);

    //     $this->db->where('id', $cart_user);

    //     $data = array(
    //         'user_credit' => $new_amount,
    //     );

    //     return $this->db->update('users', $data);

    // }


    // //Wiinders

    // public function checkWinner($winner_raffle, $winner_user ) {

    //     $this->db->where('winner_raffle', $winner_raffle);
    //     $this->db->where('winner_user', $winner_user);

    //     return $this->db->get('raffles_winners')->row_array();
    // }


    // public function addWinner($winner_raffle, $winner_user, $winner_ticket, $winner_date, $winner_time ) {

    //     $data = array(
    //         'winner_raffle' => $winner_raffle,
    //         'winner_user' => $winner_user,
    //         'winner_ticket' => $winner_ticket,
    //         'winner_date' => $winner_date,
    //         'winner_time' => $winner_time,
    //     );

    //     return $this->db->insert('winners', $data);
    // }
}

?>