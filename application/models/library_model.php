<?php
class library_model extends CI_Model
{

    public function addLibrary($library_ebook_id, $library_user_id)
    {;

        $data = array(
            'library_ebook_id' => $library_ebook_id,
            'library_user_id' => $library_user_id,
            'library_date' => date('Y-m-d'),
            'library_time' => date('H:i:s'),
        );

        return $this->db->insert('users_library', $data);
    }

    public function getLibrary($user_id)
    {
        $this->db->order_by('library_user_id', $user_id);
        return $this->db->get('users_library')->result();
    }

    public function isLibrary($library_ebook_id, $library_user_id)
    {
        $this->db->where('library_ebook_id', $library_ebook_id);
        $this->db->where('library_user_id', $library_user_id);

        return $this->db->get('users_library')->row_array();
    }

    public function deleteLibrary($library_id = null, $library_ebook_id = null, $library_user_id = null)
    {

        if ($library_id != null) {
            $this->db->where('id', $library_id);
        }

        if ($library_ebook_id != null) {
            $this->db->where('library_ebook_id', $library_ebook_id);
            $this->db->where('library_user_id', $library_user_id);
        }

        return $this->db->delete('users_library');
    }
}
