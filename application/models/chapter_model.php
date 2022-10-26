<?php
class chapter_model extends CI_Model
{


    public function addChapter($chapter_title, $chapter_ebook, $chapter_description)
    {

        $data = array(
            'chapter_ebook' => $chapter_ebook,
            'chapter_title' => $chapter_title,
            'chapter_description' => $chapter_description,
            'chapter_duration' => 0,
            'chapter_user' => $this->session->userdata('session_admin')['id'],
            'chapter_status' => 1,
            'chapter_delete_status' => 1,
        );

        return $this->db->insert('ebooks_chapters', $data);
    }


    public function getChaptersByEbook($ebook_id)
    {

        $this->db->where('chapter_ebook', $ebook_id);
        $this->db->where('chapters_delete_status', 1);
        return $this->db->get('ebooks_chapters')->result();
    }

    public function getChapter($chapter_id)
    {
        $this->db->where('id', $chapter_id);
        $this->db->where('chapters_delete_status', 1);
        return $this->db->get('ebooks_chapters')->row_array();
    }

    public function updateChapter($chapter_id, $chapter_title, $chapter_description)
    {

        $this->db->where('id', $chapter_id);

        $data = array(
            'chapter_title' => $chapter_title,
            'chapter_description' => $chapter_description,
            'chapter_user' => $this->session->userdata('session_admin')['id'],
        );

        return $this->db->update('ebooks_chapters', $data);
    }


    public function deleteChapter($chapter_id)
    {
        $this->db->where('id', $chapter_id);

        $data = array(
            'chapter_delete_status' => 0,
        );

        return $this->db->update('ebooks_chapters', $data);
    }

  
}
