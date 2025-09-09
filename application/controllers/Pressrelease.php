<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pressrelease extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pressrelease_model');
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

        $data['press_releases'] = $this->Pressrelease_model->getAllPressReleases($filters);
        $this->load->view('press_release', $data);
    }

    // View single press release by ID or slug
    public function view($id_or_slug) {
        if (is_numeric($id_or_slug)) {
            $data['press_release'] = $this->Pressrelease_model->getPressreleaseById($id_or_slug);
        } else {
            $data['press_release'] = $this->Pressrelease_model->getPressreleaseBySlug($id_or_slug);
        }

        if (!$data['press_release']) {
            show_404();
        }

        $this->load->view('view_pressrelease', $data);
    }
}
