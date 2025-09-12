<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrivacyPolicy extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // privacyPolicy.php view load karna
        $this->load->view('privacyPolicy');
    }
}
