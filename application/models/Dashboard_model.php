<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_counts()
    {
        return [
            'news_count' => $this->db->count_all('news_posts'),
            'press_count' => $this->db->count_all('press_releases'),
            'interview_count' => $this->db->count_all('interviews')
        ];
    }
}
