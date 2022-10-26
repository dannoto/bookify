<?php
class category_model extends CI_Model
{

    public function getCategories() {

        $this->db->where('category_delete_status', 1);
        return $this->db->get('ebooks_categories')->result();
    }

    public function getCategory($category_id) {
        
        $this->db->where('id', $category_id);
        $this->db->where('category_delete_status', 1);
        return $this->db->get('ebooks_categories')->row_array();
    }

    public function addCategory($category_name, $category_description) {

        $data = array(
            'category_name' => $category_name,
            'category_description' => $category_description,
            'category_delete_status' => 1
        );
       
        return $this->db->insert('ebooks_categories', $data);

    }

    public function updateCategory($category_id, $category_name, $category_description) {

        $this->db->where('id', $category_id);

        $data = array(
            'category_name' => $category_name,
            'category_description' => $category_description,
            'category_delete_status' => 1
        );
       
        return $this->db->update('ebooks_categories', $data);

    }


    public function deleteCategory($category_id) {

        $this->db->where('id', $category_id);

        $data = array(
            'category_delete_status' => 0
        );
       
        return $this->db->update('ebooks_categories', $data);
    }



    /////////////////////////////////////////////////////////////////

    public function getFeatures() {

        $this->db->where('featured_delete_status', 1);
        return $this->db->get('ebooks_features')->result();
    }

    public function getFeature($features_id) {
        
        $this->db->where('id', $features_id);
        $this->db->where('featured_delete_status', 1);
        return $this->db->get('ebooks_features')->row_array();
    }

    public function addFeatures($features_name, $features_description) {

        $data = array(
            'featured_name' => $features_name,
            'featured_description' => $features_description,
            'featured_delete_status' => 1
        );
       
        return $this->db->insert('ebooks_features', $data);

    }

    public function updateFeatures($features_id, $features_name, $features_description) {

        $this->db->where('id', $features_id);

        $data = array(
            'featured_name' => $features_name,
            'featured_description' => $features_description,
            'featured_delete_status' => 1
        );
       
        return $this->db->update('ebooks_features', $data);

    }


    public function deleteFeatures($features_id) {

        $this->db->where('id', $features_id);

        $data = array(
            'featured_delete_status' => 0
        );
       
        return $this->db->update('ebooks_features', $data);
    }

   

}
