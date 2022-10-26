<?php
class ebook_model extends CI_Model
{


    public function addEbook($ebook_title, $ebook_description, $ebook_image, $ebook_tags, $ebook_status, $ebook_precificacao, $ebook_category, $ebook_featured, $ebook_publisher, $ebook_author)
    {

        $data = array(
            'ebook_title' => $ebook_title,
            'ebook_description' => $ebook_description,
            'ebook_image' => $ebook_image,
            'ebook_tags' => $ebook_tags,
            'ebook_date' => date('Y-m-d'),
            'ebook_time' => date('H:i:s'),
            'ebook_user' => "1", //$this->session->userdata('session_admin')['id'],
            'ebook_status' => $ebook_status,
            'ebook_delete_status' => 1,
            'ebook_precificacao' => $ebook_precificacao,
            'ebook_category' => $ebook_category,
            'ebook_featured' => $ebook_featured,
            'ebook_publisher' => $ebook_publisher,
            'ebook_author' => $ebook_author
        );

        $this->db->insert('ebooks', $data);
        return $this->db->insert_id();
    }


    public function getEbooks()
    {
        $this->db->order_by('id', 'desc');

        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        return $this->db->get('ebooks')->result();
    }

    public function getEbooksAdmin()
    {
        $this->db->order_by('id', 'desc');

        $this->db->where('ebook_delete_status', 1);
        return $this->db->get('ebooks')->result();
    }

    public function getEbook($ebook_id)
    {
        $this->db->where('id', $ebook_id);
        $this->db->where('ebook_delete_status', 1);
        return $this->db->get('ebooks')->row_array();
    }

    public function updateEbook($ebook_id, $ebook_title, $ebook_description, $ebook_image, $ebook_tags, $ebook_status, $ebook_precificacao, $ebook_category, $ebook_featured, $ebook_publisher, $ebook_author)
    {

        $this->db->where('id', $ebook_id);

        if (strlen($ebook_image) > 0) {

            $data = array(
                'ebook_title' => $ebook_title,
                'ebook_description' => $ebook_description,
                'ebook_image' => $ebook_image,
                'ebook_tags' => $ebook_tags,
                'ebook_date' => date('Y-m-d'),
                'ebook_time' => date('H:i:s'),
                'ebook_user' => 1, //$this->session->userdata('session_admin')['id'],
                'ebook_status' => $ebook_status,
                'ebook_precificacao' => $ebook_precificacao,
                'ebook_category' => $ebook_category,
                'ebook_featured' => $ebook_featured,
                'ebook_publisher' => $ebook_publisher,
                'ebook_author' => $ebook_author,
            );
        } else {

            $data = array(
                'ebook_title' => $ebook_title,
                'ebook_description' => $ebook_description,
                'ebook_tags' => $ebook_tags,
                'ebook_date' => date('Y-m-d'),
                'ebook_time' => date('H:i:s'),
                'ebook_user' => 1, //$this->session->userdata('session_admin')['id'],
                'ebook_status' => $ebook_status,
                'ebook_precificacao' => $ebook_precificacao,
                'ebook_category' => $ebook_category,
                'ebook_featured' => $ebook_featured,
                'ebook_publisher' => $ebook_publisher,
                'ebook_author' => $ebook_author,
            );
        }


        return $this->db->update('ebooks', $data);
    }


    public function deleteEbook($ebook_id)
    {
        $this->db->where('id', $ebook_id);

        $data = array(
            'ebook_delete_status' => 0,
        );

        return $this->db->update('ebooks', $data);
    }
}
