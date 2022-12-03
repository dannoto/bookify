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
            'chapter_user' => 1, //$this->session->userdata('session_admin')['id'],
            'chapter_status' => 1,
            'chapter_delete_status' => 1,
        );

        return $this->db->insert('ebooks_chapters', $data);
    }


    public function convertMinutes($duration)
    {
        $duration = explode( ".", $duration);

        $value = (($duration[1] / 100) * 60);

        if (is_nan($value)) {
            $duration = ($duration[0] . ":00");
        } else {

            $duration = ($duration[0] . ":" . round($value, 0));
        }

        return $duration;
    }


    public function getChaptersByEbook($ebook_id)
    {

        $this->db->where('chapter_ebook', $ebook_id);
        $this->db->where('chapter_delete_status', 1);
        return $this->db->get('ebooks_chapters')->result();
    }

    public function getChapter($chapter_id)
    {
        $this->db->where('id', $chapter_id);
        $this->db->where('chapter_delete_status', 1);
        return $this->db->get('ebooks_chapters')->row_array();
    }

    public function updateChapter($chapter_id, $chapter_title, $chapter_description)
    {

        $this->db->where('id', $chapter_id);

        $data = array(
            'chapter_title' => $chapter_title,
            'chapter_description' => $chapter_description,
            'chapter_user' => 1, //$this->session->userdata('session_admin')['id'],
        );

        return $this->db->update('ebooks_chapters', $data);
    }

    public function increaseChapterDuration($chapter_id, $audio_duration)
    {
        $this->db->where('id', $chapter_id);
        $this->db->set('chapter_duration', 'chapter_duration' . "+" . $audio_duration, FALSE);
        $this->db->update('ebooks_chapters');
    }

    public function decreaseChapterDuration($chapter_id, $audio_duration)
    {
        $this->db->where('id', $chapter_id);
        $this->db->set('chapter_duration', 'chapter_duration' . "-" . $audio_duration, FALSE);
        $this->db->update('ebooks_chapters');
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
