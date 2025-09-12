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
    }

    public function index()
    {
        // dashboard view load karo
        $this->load->view('dashboard/main-dashboard');
    }
}
