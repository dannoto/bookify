<?php
class faq_model extends CI_Model
{

    public function getFaqsCategory() {

        return $this->db->get('faq_categories')->result();

    }

    public function getFaqsContentByCategory($faq_category) {

        $this->db->where('faq_category', $faq_category);
        return $this->db->get('faq_content')->result();

    }

    // public function getFaq($user_email, $user_token) {

    //     return true;

    // }

   

    // public function addFaq($user_email, $user_token) {

    //     return true;

    // }

    // public function updateFaq($user_email, $user_token) {

    //     return true;

    // }

    // public function deleteFaq($user_email, $user_token) {

    //     return true;

    // }


   

}
?>