<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pressrelease_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Get all press releases with optional filters and limit
     * @param array $filters ['main_category'=>..., 'subcategory'=>..., 'search'=>..., 'not_id'=>...]
     * @param int|null $limit
     * @return array
     */
    public function getAllPressReleases($filters = [], $limit = null) {
        $this->db->select('*');
        $this->db->from('press_releases');

        // Filter by main category
        if (!empty($filters['main_category'])) {
            $this->db->where('main_category', $filters['main_category']);
        }

        // Filter by subcategory
        if (!empty($filters['subcategory'])) {
            $this->db->like('category', $filters['subcategory'], 'both');
        }

        // Search in title or content
        if (!empty($filters['search'])) {
            $this->db->group_start();
            $this->db->like('title', $filters['search']);
            $this->db->or_like('content', $filters['search']);
            $this->db->group_end();
        }

        // Exclude a specific ID
        if (!empty($filters['not_id'])) {
            $this->db->where('id !=', $filters['not_id']);
        }

        $this->db->order_by('created_at', 'DESC');

        if ($limit) {
            $this->db->limit($limit);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get single press release by ID
     */
    public function getPressreleaseById($id) {
        $query = $this->db->get_where('press_releases', ['id' => $id]);
        return $query->row_array();
    }

    /**
     * Get single press release by slug
     */
    public function getPressreleaseBySlug($slug) {
        $query = $this->db->get_where('press_releases', ['slug' => $slug]);
        return $query->row_array();
    }

    /**
     * Get all distinct main categories
     */
    public function getMainCategories() {
        $this->db->select('DISTINCT(main_category)');
        $this->db->from('press_releases');
        $query = $this->db->get();
        return array_column($query->result_array(), 'main_category');
    }

    /**
     * Get all subcategories for a given main category
     */
    public function getSubcategories($main_category) {
        $this->db->select('category');
        $this->db->from('press_releases');
        $this->db->where('main_category', $main_category);
        $query = $this->db->get();

        $subcategories = [];
        foreach ($query->result_array() as $row) {
            $subs = array_map('trim', explode(',', $row['category']));
            $subcategories = array_merge($subcategories, $subs);
        }
        return array_unique(array_filter($subcategories));
    }

}
