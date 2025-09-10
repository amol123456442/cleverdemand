<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Articles_model');
        $this->load->helper('url');
    }

    // List all press releases
    public function index() {
        $filters = [];

        if ($this->input->get('main_category')) {
            $filters['main_category'] = $this->input->get('main_category');
        }
        if ($this->input->get('subcategory')) {
            $filters['subcategory'] = $this->input->get('subcategory');
        }
        if ($this->input->get('search')) {
            $filters['search'] = $this->input->get('search');
        }

        $data['articles'] = $this->Articles_model->getAllPressReleases($filters);
        $this->load->view('articles', $data);
    }

    // View single press release by ID or slug
    public function view($id_or_slug) {
        if (is_numeric($id_or_slug)) {
            $data['articles'] = $this->Articles_model->getPressreleaseById($id_or_slug);
        } else {
            $data['articles'] = $this->Articles_model->getPressreleaseBySlug($id_or_slug);
        }

        if (!$data['articles']) {
            show_404();
        }

        $this->load->view('view_articles', $data);
    }
}
