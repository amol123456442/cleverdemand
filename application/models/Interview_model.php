<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interview_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_interviews($category = null, $subcategory = null, $search = null) {
        $this->db->select('*');
        $this->db->from('interviews');

        if ($category) {
            $this->db->where('main_category', $category);
        }

        if ($subcategory) {
            $this->db->like('category', $subcategory);
        }

        if ($search) {
            $this->db->group_start();
            $this->db->like('title', $search);
            $this->db->or_like('content', $search);
            $this->db->or_like('interviewee_name', $search);
            $this->db->or_like('company_name', $search);
            $this->db->group_end();
        }

        $this->db->order_by('created_at', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_interview_by_slug($slug) {
        $this->db->select('*');
        $this->db->from('interviews');
        $this->db->where('slug', $slug);
        return $this->db->get()->row_array();
    }

    // Additional methods for CreateInterviewController
    public function insert_interview($data) {
        return $this->db->insert('interviews', $data);
    }

    public function get_interview($id) {
        $this->db->where('id', $id);
        return $this->db->get('interviews')->row_array();
    }

    public function update_interview($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('interviews', $data);
    }
}
?>