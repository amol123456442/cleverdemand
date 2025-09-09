<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $filters = [
            'category' => $this->input->get('category', TRUE),
            'subcategory' => $this->input->get('subcategory', TRUE),
            'search' => $this->input->get('search', TRUE)
        ];

        try {
            $data['news'] = $this->News_model->get_news($filters);
            $data['categories'] = $this->News_model->get_categories();
            $data['selected_category'] = $filters['category'] ? $filters['category'] : '';
            $data['subcategories'] = $filters['category'] ? $this->News_model->get_subcategories($filters['category']) : [];
        } catch (Exception $e) {
            log_message('error', 'Error fetching news: ' . $e->getMessage());
            $data['news'] = [];
            $data['categories'] = ['MarTech', 'HRTech', 'Fintech', 'Consumer Tech'];
            $data['selected_category'] = '';
            $data['subcategories'] = [];
        }

        $this->load->view('news', $data);
    }

    public function view($slug)
    {
        $data['news_item'] = $this->News_model->get_news_by_slug($slug);
        if (!$data['news_item']) {
            show_404();
        }
        // Calculate read time (assuming 200 words per minute)
        $word_count = str_word_count(strip_tags($data['news_item']['content']));
        $data['news_item']['read_time'] = ceil($word_count / 200) . ' Mins Read';
        $this->load->view('view_news', $data);
    }
}