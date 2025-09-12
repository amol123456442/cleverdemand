<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Interview_model');
        $this->load->model('Articles_model');
        $this->load->library('email'); // Email Library Load
    }

    public function index()
    {
        $data['featured_news'] = $this->News_model->get_news([], 1);

        $filters = ['not_id' => !empty($data['featured_news'][0]['id']) ? $data['featured_news'][0]['id'] : null];
        $data['latest_news'] = $this->News_model->get_news($filters, 4);

        $data['latest_interviews'] = $this->Interview_model->get_latest_interviews(3);
        $data['latest_articles']   = $this->Articles_model->getAllPressReleases([], 3);

        $data['categories'] = $this->News_model->get_categories();
        $data['news_by_category'] = [];
        foreach ($data['categories'] as $category) {
            $data['news_by_category'][$category] = $this->News_model->get_news(['category' => $category], 5);
        }

        $this->load->view('home', $data);
    }

    // ✅ Subscribe Form Handler
    public function subscribe()
    {
        $email = $this->input->post('email', true);

        if ($email) {
            // Receiver Email
            $this->email->from('your_email@gmail.com', 'Tech News');
            $this->email->to($email);
            $this->email->subject('Subscription Confirmation');
            $this->email->message("<h3>Thank you for subscribing!</h3><p>You’ll now receive the latest tech updates.</p>");

            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Subscription successful! Please check your inbox.');
            } else {
                $this->session->set_flashdata('error', $this->email->print_debugger());
            }
        }

        redirect(base_url()); // वापस home पर
    }
}
