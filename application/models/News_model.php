<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Get all news articles with optional filters
    public function get_news($filters = [], $limit = null)
    {
        $this->db->select('*');
        $this->db->from('news_posts');

        // Apply filters
        if (!empty($filters['category'])) {
            $this->db->where('main_category', $filters['category']);
        }
        if (!empty($filters['subcategory'])) {
            $this->db->like('category', $filters['subcategory'], 'both');
        }
        if (!empty($filters['search'])) {
            $this->db->like('title', $filters['search']);
            $this->db->or_like('content', $filters['search']);
        }
        if (!empty($filters['not_id'])) {
            $this->db->where('id !=', $filters['not_id']);
        }

        $this->db->order_by('created_at', 'DESC');
        if ($limit) {
            $this->db->limit($limit);
        }
        $query = $this->db->get();
        log_message('debug', 'Get News Query: ' . $this->db->last_query());
        return $query->result_array();
    }

    // Get a single news article by ID
    public function get_news_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('news_posts');
        $this->db->where('id', $id);
        $query = $this->db->get();
        log_message('debug', 'Get News by ID Query: ' . $this->db->last_query());
        return $query->row_array();
    }

    // Get a single news article by slug
    public function get_news_by_slug($slug)
    {
        $this->db->select('*');
        $this->db->from('news_posts');
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        log_message('debug', 'Get News by Slug Query: ' . $this->db->last_query());
        return $query->row_array();
    }

    // Get distinct categories
    public function get_categories()
    {
        $this->db->select('DISTINCT(main_category)');
        $this->db->from('news_posts');
        $query = $this->db->get();
        return array_column($query->result_array(), 'main_category');
    }

    // Get subcategories for a given category
    public function get_subcategories($category)
    {
        $this->db->select('category');
        $this->db->from('news_posts');
        $this->db->where('main_category', $category);
        $query = $this->db->get();
        
        $subcategories = [];
        foreach ($query->result_array() as $row) {
            $subs = array_map('trim', explode(',', $row['category']));
            $subcategories = array_merge($subcategories, $subs);
        }
        return array_unique(array_filter($subcategories));
    }
}