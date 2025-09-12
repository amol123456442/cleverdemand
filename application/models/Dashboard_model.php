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

    public function get_monthly_counts($table)
    {
        $this->db->select('MONTH(created_at) as month, COUNT(*) as total');
        $this->db->from($table);
        $this->db->group_by('MONTH(created_at)');
        $query = $this->db->get();
        $result = $query->result_array();

        $counts = array_fill(1, 12, 0); // Initialize Jan-Dec with 0
        foreach ($result as $row) {
            $counts[(int)$row['month']] = (int)$row['total'];
        }

        return $counts;
    }
}
