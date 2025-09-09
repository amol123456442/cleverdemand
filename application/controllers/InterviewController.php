<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InterviewController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Interview_model');
        $this->load->helper(['url', 'text']);
        $this->load->library('session');
    }

    public function index() {
        $category = $this->input->get('category', TRUE);
        $subcategory = $this->input->get('subcategory', TRUE);
        $search = $this->input->get('search', TRUE);

        $data['interviews'] = $this->Interview_model->get_interviews($category, $subcategory, $search);
        $data['title'] = 'Latest Interviews';

        if (empty($data['interviews']) && ($category || $subcategory || $search)) {
            $this->session->set_flashdata('message', 'No interviews found.');
        }

        $this->load->view('interviews', $data);
    }

    public function view($slug) {
        $data['interview'] = $this->Interview_model->get_interview_by_slug($slug);

        if (!$data['interview']) {
            $this->session->set_flashdata('error', 'Interview not found.');
            redirect('interviews');
        }

        $data['title'] = $data['interview']['title'];
        $this->load->view('interview_view', $data);
    }
}
?>