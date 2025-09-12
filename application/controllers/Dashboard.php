<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // 🔐 Session check
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Please login to access the dashboard.');
            redirect('auth/login');
        }
    }

    public function index() {
        $data['username'] = $this->session->userdata('username');
        $data['role']     = $this->session->userdata('role');

        // dashboard/home.php ko load karega
        $this->load->view('dashboard/home', $data);
    }
}
