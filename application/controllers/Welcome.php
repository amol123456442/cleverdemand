<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Interview_model');
        $this->load->model('Articles_model'); // ✅ Articles model load
    }

    public function index()
    {
        // 1 featured latest news
        $data['featured_news'] = $this->News_model->get_news([], 1);

        // Baaki 4 latest news (featured ko exclude karke)
        $filters = ['not_id' => !empty($data['featured_news'][0]['id']) ? $data['featured_news'][0]['id'] : null];
        $data['latest_news'] = $this->News_model->get_news($filters, 4);

        // 3 latest interviews
        $data['latest_interviews'] = $this->Interview_model->get_latest_interviews(3);

        // 3 latest articles
        $data['latest_articles'] = $this->Articles_model->getAllPressReleases([], 3);

        $data['categories'] = $this->News_model->get_categories();

        // Latest 5 news per category
        $data['news_by_category'] = [];
        foreach ($data['categories'] as $category) {
            $data['news_by_category'][$category] = $this->News_model->get_news(['category' => $category], 5);
        }

        $this->load->view('home', $data);
    }
}
