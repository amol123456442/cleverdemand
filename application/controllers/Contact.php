<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation', 'session'));

        // Call table creation check on load
        $this->Contact_model->create_table_if_not_exists();
    }

    public function index()
    {
        $this->load->view('contact_form');
    }

    public function submit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('message', 'Message', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('contact_form');
        } else {
            $data = [
                'name'    => $this->input->post('name'),
                'email'   => $this->input->post('email'),
                'message' => $this->input->post('message')
            ];

            $this->Contact_model->insert_contact($data);

            // Flash success message
            $this->session->set_flashdata('success', 'Your message has been sent successfully!');

            // Redirect back to contact form page
            redirect('contact');
        }
    }
}
