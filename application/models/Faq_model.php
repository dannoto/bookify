<?php
class faq_model extends CI_Model
{

    public function getFaqsCategory() {

        $this->db->order_by('id','desc');
        return $this->db->get('faq_categories')->result();

    }

    public function countFaq() {

        return $this->db->get('faq_content')->result();

    }
    public function getFaqsContentByCategory($faq_category) {
        $this->db->order_by('id','desc');

        $this->db->where('faq_category', $faq_category);
        return $this->db->get('faq_content')->result();

    }


   

    public function addFaq($faq_title, $faq_description, $faq_category) {

        $data = array(
            'faq_title' => $faq_title,
            'faq_description' => $faq_description,
            'faq_category' => $faq_category
        );

        return $this->db->insert('faq_content', $data);

    }

    public function updateFaq($faq_id, $faq_title, $faq_description, $faq_category) {

        $this->db->where('id', $faq_id);
         $data = array(
            'faq_title' => $faq_title,
            'faq_description' => $faq_description,
            'faq_category' => $faq_category
        );
        
        return $this->db->update('faq_content', $data);

    }

    public function deleteFaq($faq_id) {

        $this->db->where('id', $faq_id);
        return $this->db->delete('faq_content');

    }

    public function addFaqCategory($faq_title, $faq_description) {

        $data = array(
           'faq_category_title' => $faq_title,
           'faq_category_description' => $faq_description,
       );
       
       return $this->db->insert('faq_categories', $data);

    }

    public function updateFaqCategory($faq_id, $faq_title, $faq_description) {

        $this->db->where('id', $faq_id);
        $data = array(
           'faq_category_title' => $faq_title,
           'faq_category_description' => $faq_description,
       );
       
       return $this->db->update('faq_categories', $data);

    }

    public function deleteFaqCategory($faq_id) {

        $this->db->where('id', $faq_id);
        return $this->db->delete('faq_categories');

    }

    public function deleteCategoryRelated($category_id) {

        $this->db->where('faq_category', $category_id);
        return $this->db->delete('faq_content');

    }


   

}
?>