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



    public function getHours($minutes)
    {

        $h = intdiv($minutes, 60);
        $m = ($minutes % 60);

        if ($h < 10) {
            $h = "0" . $h;
        }

        if ($m < 10) {
            $m = $m . "0";
        }

        if ($h > 0) {
            $hours = $h . ':' . $m . ':00';
        } else {
            $hours = $m . ':00';
        }



        return $hours;
    }


    public function getEbooksByFeaturesTotalPrecificacao($features_id, $ebook_precificacao, $limit = null, $start = null)
    {
        if ($limit !== null) {
            $this->db->limit($start, $limit);
        }
        
        $this->db->order_by('id', 'desc');
        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_featured', $features_id);
        $this->db->where('ebook_precificacao', $ebook_precificacao);

        return $this->db->get('ebooks')->result();
    }

    public function getEbooksByCategoryTotalPrecificacao($category_id, $ebook_precificacao, $limit = null, $start = null)
    {
        if ($limit !== null) {
            $this->db->limit($start, $limit);
        }

        $this->db->order_by('id', 'desc');
        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_category', $category_id);
        $this->db->where('ebook_precificacao', $ebook_precificacao);

        return $this->db->get('ebooks')->result();
    }
    
    public function getEbooksByCategoryTotal($category_id, $limit = null, $start = null)
    {

        if ($limit !== null) {
            $this->db->limit($start, $limit);
        }
        //Para catalogo com limita????o
        $this->db->order_by('id', 'desc');
        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_category', $category_id);

        return $this->db->get('ebooks')->result();
    }

    public function getEbooksByFeaturesTotal($featured_id, $limit = null, $start = null)
    {
        if ($limit !== null) {
            $this->db->limit($start, $limit);
        }

        //Para catalogo com limita????o
        $this->db->order_by('id', 'desc');
        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_featured', $featured_id);

        return $this->db->get('ebooks')->result();
    }


    public function getEbooksByFeatures($featured_id)
    {
        //Para catalogo com limita????o
        $this->db->order_by('id', 'desc');
        $this->db->where('ebook_status', 1);
        $this->db->limit('15');

        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_featured', $featured_id);

        return $this->db->get('ebooks')->result();
    }

    public function getEbooksByCategory($category_id)
    {

        //Para catalogo com limita????o
        $this->db->order_by('id', 'desc');
        $this->db->limit('15');
        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_category', $category_id);

        return $this->db->get('ebooks')->result();
    }

    public function slugify($text)
    {
        $caracteres_sem_acento = array(
            '??' => 'S', '??' => 's', '??' => 'Dj', '??' => 'Z', '??' => 'z', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A',
            '??' => 'A', '??' => 'A', '??' => 'C', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I', '??' => 'I',
            '??' => 'I', '??' => 'N', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'U', '??' => 'U',
            '??' => 'U', '??' => 'U', '??' => 'Y', '??' => 'B', '??' => 'Ss', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a',
            '??' => 'a', '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i', '??' => 'i',
            '??' => 'i', '??' => 'o', '??' => 'n', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'u',
            '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'y', '??' => 'y', '??' => 'b', '??' => 'y', '??' => 'f',
            '??' => 'a', '??' => 'i', '??' => 'a', '??' => 's', '??' => 't', '??' => 'A', '??' => 'I', '??' => 'A', '??' => 'S', '??' => 'T',  '-' => '', '(' => '', ')' => '', ',' => '', '.' => '', '??' => 'C', '??' => 'c', " " => "-"
        );
        $nova_string = strtr($text, $caracteres_sem_acento);

        return $nova_string;
    }
    public function getEbooksByRelated($ebook_id, $ebook_category)
    {

        $this->db->order_by('id', 'desc');
        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        $this->db->where('ebook_category', $ebook_category);
        $this->db->where('id !=', $ebook_id);


        return $this->db->get('ebooks')->result();
    }

    public function getEbooksSearch($ebook_precificacao, $ebook_category, $ebook_title, $limit = null, $start = null)
    {

        if ($limit !== null) {
            $this->db->limit($start, $limit);
        }

        if (strlen($ebook_precificacao) > 0 ) {
            // echo "preco";
            $this->db->where('ebook_precificacao', $ebook_precificacao);
        }
        if (strlen($ebook_category) > 0 ) {
            // echo "categoria";
            $this->db->where('ebook_category', $ebook_category);
        }
        if (strlen($ebook_title) > 0 ) {

            $this->db->like('ebook_title', $ebook_title);
            $this->db->or_like('ebook_tags',$ebook_title); 

        }

        $this->db->order_by('id', 'desc');

        $this->db->where('ebook_status', 1);
        $this->db->where('ebook_delete_status', 1);
        return $this->db->get('ebooks')->result();
    }

    public function getEbooks($limit = null, $start = null)
    {

        if ($limit !== null) {
            $this->db->limit($start, $limit);
        }

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

    public function increaseEbookDuration($ebook_id, $audio_duration) {
        $this->db->where('id', $ebook_id);
        $this->db->set('ebook_duration', 'ebook_duration'."+".$audio_duration, FALSE);
        $this->db->update('ebooks'); 
    }

    public function decreaseEbookDuration($ebook_id, $audio_duration) {
        $this->db->where('id', $ebook_id);
        $this->db->set('ebook_duration', 'ebook_duration'."-".$audio_duration, FALSE);
        $this->db->update('ebooks'); 
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
