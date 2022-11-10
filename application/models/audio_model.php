<?php
class audio_model extends CI_Model
{


    public function addAudio($audio_chapter, $audio_ebook, $audio_title, $audio_description, $audio_file, $audio_duration)
    {

        $data = array(
            'audio_chapter' => $audio_chapter,
            'audio_ebook' => $audio_ebook,
            'audio_title' => $audio_title,
            'audio_description' => $audio_description,
            'audio_file' => $audio_file,
            'audio_duration' => $audio_duration,
            'audio_date' => date('Y-m-d'),
            'audio_time' => date('H:i:s'),
            'audio_user' => 1, //$this->session->userdata('session_admin')['id'],
            'audio_status' => 1,
            'audio_delete_status' => 1,
        );

        return $this->db->insert('ebooks_audios', $data);
    }


    public function getAudiosByChapters($chapter_id)
    {

        $this->db->where('audio_chapter', $chapter_id);
        $this->db->where('audio_delete_status', 1);
        return $this->db->get('ebooks_audios')->result();
    }

    public function getAudio($audio_id)
    {
        $this->db->where('id', $audio_id);
        $this->db->where('audio_delete_status', 1);
        return $this->db->get('ebooks_audios')->row_array();
    }

    public function updateAudio($audio_id, $audio_chapter, $audio_title, $audio_description, $audio_file, $audio_duration)
    {

        $this->db->where('id', $audio_id);

        if (strlen($audio_file) > 0) {

            $data = array(
                'audio_chapter' => $audio_chapter,
                'audio_title' => $audio_title,
                'audio_description' => $audio_description,
                'audio_file' => $audio_file,
                'audio_duration' => $audio_duration,
                'audio_date' => date('Y-m-d'),
                'audio_time' => date('H:i:s'),
                'audio_user' => 1 //$this->session->userdata('session_admin')['id'],

            );
        } else {

            $data = array(
                'audio_chapter' => $audio_chapter,
                'audio_title' => $audio_title,
                'audio_description' => $audio_description,
                'audio_duration' => $audio_duration,
                'audio_date' => date('Y-m-d'),
                'audio_time' => date('H:i:s'),
                'audio_user' => 1 //$this->session->userdata('session_admin')['id'],
            );
        }


        return $this->db->update('ebooks_audios', $data);
    }


    public function deleteAudio($audio_id)
    {
        $this->db->where('id', $audio_id);

        $data = array(
            'audio_delete_status' => 0,
        );

        return $this->db->update('ebooks_audios', $data);
    }


    public function deleteAudiosByChapter($chapter_id)
    {
        $this->db->where('audio_chapter', $chapter_id);

        $data = array(
            'audio_delete_status' => 0,
        );

        return $this->db->update('ebooks_audios', $data);
    }
}
