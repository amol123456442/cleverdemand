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
        // Get counts
        $data['counts'] = $this->Dashboard_model->get_counts();

        // Load dashboard view with counts
        $this->load->view('dashboard/main-dashboard', $data);
    }
}
