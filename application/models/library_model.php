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

    public function removeLibrary($ebook_id, $ebook_user)
    {

        $this->db->where('library_user_id', $ebook_user);
        $this->db->where('library_ebook_id', $ebook_id);


        return $this->db->delete('users_library');
    }

    public function getLibrary($user_id)
    {
        $this->db->where('library_user_id', $user_id);
        return $this->db->get('users_library')->result();
    }

    public function getLibraryComplete($library, $user_id)
    {

        $data = array();
        foreach ($library as $a) {
            //Count progress audio
            $ebook_progress_count = count($this->ebookProgressUser($a->library_ebook_id, $user_id));
            //Count total Audio
            $ebook_progress_total = count($this->ebookProgressTotal($a->library_ebook_id));

            
            if ($ebook_progress_count >= $ebook_progress_total) {
                // echo $a->library_ebook_id." PROGRESS: ".$ebook_progress_count." - TOTAL".$ebook_progress_total;
                array_push($data, $a);
            }
        }

        return $data;
    }

    public function getLibraryProgress($library, $user_id)
    {

        $data = array();
        foreach ($library as $a) {
            //Count progress audio
            $ebook_progress_count = count($this->ebookProgressUser($a->library_ebook_id, $user_id));
            //Count total Audio
            $ebook_progress_total = count($this->ebookProgressTotal($a->library_ebook_id));

            if ($ebook_progress_count < $ebook_progress_total) {
                // echo $a->library_ebook_id." PROGRESS: ".$ebook_progress_count." - TOTAL".$ebook_progress_total;

                array_push($data, $a);
            }
        }

        return $data;
    }

    public function ebookProgressTotal($ebook_id)
    {
        $this->db->where('audio_ebook', $ebook_id);
        $this->db->where('audio_delete_status', 1);
        return $this->db->get('ebooks_audios')->result();
    }

    public function ebookProgressUser($ebook_id, $user_id)
    {
        $this->db->where('progress_ebook', $ebook_id);
        $this->db->where('progress_user', $user_id);

        return $this->db->get('ebooks_audios_progress')->result();
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
