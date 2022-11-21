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


    // Images


    public function getAudioImages($audio_id) {

        $this->db->where('image_audio', $audio_id);
        $this->db->where('image_delete_status','1');

        return $this->db->get('ebooks_chapters_images')->result();


    } 


    public function addAudioImage($image_title, $image_description , $image_audio, $image_chapter, $image_ebook, $image_file) {

        $data = array(
            'image_title' => $image_title,
            'image_description' => $image_description,
            'image_file' => $image_file,
            'image_user' => 1,
            'image_delete_status' => 1,
            'image_chapter' => $image_chapter,
            'image_ebook' => $image_ebook,
            'image_audio' => $image_audio,

        );

        return $this->db->insert('ebooks_chapters_images', $data);


    } 




    public function deleteAudioImage($image_id) 
        {
        $this->db->where('id', $image_id);

        $data = array(
            'image_delete_status' => 0,
        );

        return $this->db->update('ebooks_chapters_images', $data);
    }


    // Progress Modal
    public function getProgressCurrent($ebook_id) {

        $this->db->where('progress_ebook', $ebook_id);
        $this->db->order_by('id','desc');
        // $this->db->limit('1');

        return $this->db->get('ebooks_audios_progress')->row_array();

    }

    public function getProgressCurrentList($ebook_id) {

        $this->db->where('audio_ebook', $ebook_id);
        $this->db->order_by('id','asc');
        $this->db->where('audio_delete_status', 1);

        // $this->db->limit('1');

        return $this->db->get('ebooks_audios')->result();

    }

    public function getProgressFirst($ebook_id) {

        $this->db->where('audio_ebook', $ebook_id);
        $this->db->where('audio_delete_status', 1);
        $this->db->order_by('id','asc');
        return $this->db->get('ebooks_audios')->row_array();


    }

    public function addProgress($progress_ebook, $progress_chapter, $progress_audio) {

        $data = array(
            'progress_ebook' => $progress_ebook,
            'progress_chapter' => $progress_chapter,
            'progress_audio' => $progress_audio,
            'progress_date' =>  date('Y-m-d- H:i:s'),
            'progress_user' => $this->session->userdata('session_user')['id']
        );

        return $this->db->insert('ebooks_audios_progress', $data);
    }

    public function getProgress($progress_ebook, $progress_chapter, $progress_audio, $progress_user)  {
        $this->db->where('progress_ebook', $progress_ebook);
        $this->db->where('progress_chapter', $progress_chapter);
        $this->db->where('progress_audio', $progress_audio);
        $this->db->where('progress_user', $progress_user);


        return $this->db->get('ebooks_audios_progress')->row_array();

    }

    
    // Progress Model
}
