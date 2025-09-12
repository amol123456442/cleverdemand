<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MainDashboard extends CI_Controller


{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        // Model load
        $this->load->model('Dashboard_model');
    }
    public function index()
    {
        $this->load->model('Dashboard_model');

        $data['counts'] = $this->Dashboard_model->get_counts();
        $data['news_monthly'] = $this->Dashboard_model->get_monthly_counts('news_posts');
        $data['interview_monthly'] = $this->Dashboard_model->get_monthly_counts('interviews');

        $this->load->view('dashboard/main-dashboard', $data);
    }
}
