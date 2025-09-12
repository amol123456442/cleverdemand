<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscribe extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Subscribe_model');
        $this->load->library('email'); // Email library load
        $this->email->initialize($this->config->item('email'));
    }

    // Form submit
    public function submit()
    {
        $email = $this->input->post('email', TRUE);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->set_flashdata('error', 'Invalid email address.');
            redirect($_SERVER['HTTP_REFERER']);
        }

        // Save email in DB
        $this->Subscribe_model->save_email($email);

        // Send confirmation email
        $this->_send_email($email);

        $this->session->set_flashdata('success', 'Thank you for subscribing!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    private function _send_email($to_email)
    {
        $this->email->from('your_email@example.com', 'Your Website');
        $this->email->to($to_email);
        $this->email->subject('Subscription Confirmation');
        $this->email->message("Hi,\n\nThank you for subscribing to our newsletter.\n\nBest Regards,\nTeam");

        if (!$this->email->send()) {
            log_message('error', 'Email failed: ' . $this->email->print_debugger());
        }
    }
}
