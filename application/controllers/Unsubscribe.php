<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unsubscribe extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Agar model use karna ho unsubscribe ke liye (optional)
        $this->load->model('Subscribe_model');
    }

    // Default method -> unsubscribe page load karega
    public function index()
    {
        $this->load->view('unsubscribe');
    }

    // Email unsubscribe action
    public function remove()
    {
        $email = $this->input->post('email', TRUE);

        if (!empty($email)) {
            // Agar model hai to DB se remove karo
            if ($this->Subscriber_model->remove_email($email)) {
                $this->session->set_flashdata('success', 'You have been unsubscribed successfully.');
            } else {
                $this->session->set_flashdata('error', 'Email not found in our records.');
            }
        } else {
            $this->session->set_flashdata('error', 'Please provide a valid email.');
        }

        redirect('unsubscribe');
    }
}
