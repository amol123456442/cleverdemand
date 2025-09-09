<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateInterviewController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Interview_model');
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->helper(['url', 'form', 'text']);
    }

    public function index() {
        $data['title'] = 'Create New Interview';
        $this->load->view('create_interview', $data);
    }

    public function store() {
        $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|alpha_dash|max_length[255]|is_unique[interviews.slug]');
        $this->form_validation->set_rules('main_category', 'Main Category', 'required|trim');
        $this->form_validation->set_rules('category', 'Subcategories', 'required|trim');
        $this->form_validation->set_rules('provided', 'Provided By', 'required|trim');
        $this->form_validation->set_rules('interviewee_name', 'Interviewee Name', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('interviewee_designation', 'Interviewee Designation', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('company_industry', 'Company Industry', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->load->view('create_interview');
            return;
        }

        $image_path = null;
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './Uploads/interviews/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 5120; // 5MB
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->load->view('create_interview');
                return;
            } else {
                $image_path = 'Uploads/interviews/' . $this->upload->data('file_name');
            }
        }

        $provider_logo = '';
        $provided = $this->input->post('provided', TRUE);
        switch ($provided) {
            case 'Business Wire':
                $provider_logo = 'assets/logos/business_wire.png';
                break;
            case 'PR Newswire':
                $provider_logo = 'assets/logos/pr_newswire.png';
                break;
            case 'PRWeb':
                $provider_logo = 'assets/logos/PRWeb_Logo.png';
                break;
            case 'GlobeNewswire':
                $provider_logo = 'assets/logos/globenewswire.png';
                break;
        }

        $data = [
            'title' => $this->input->post('title', TRUE),
            'slug' => $this->input->post('slug', TRUE),
            'main_category' => $this->input->post('main_category', TRUE),
            'category' => $this->input->post('category', TRUE),
            'provided' => $provided,
            'provider_logo' => $provider_logo,
            'image' => $image_path,
            'interviewee_name' => $this->input->post('interviewee_name', TRUE),
            'interviewee_designation' => $this->input->post('interviewee_designation', TRUE),
            'interviewee_bio' => $this->input->post('interviewee_bio', TRUE),
            'company_name' => $this->input->post('company_name', TRUE),
            'company_industry' => $this->input->post('company_industry', TRUE),
            'company_description' => $this->input->post('company_description', TRUE),
            'content' => $this->input->post('content', FALSE),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Interview_model->insert_interview($data)) {
            $this->session->set_flashdata('success', 'Interview created successfully!');
            redirect('createinterviewcontroller');
        } else {
            $this->session->set_flashdata('error', 'Failed to create interview. Please try again.');
            $this->load->view('create_interview');
        }
    }

    public function edit($id) {
        $data['interview'] = $this->Interview_model->get_interview($id);
        if (!$data['interview']) {
            $this->session->set_flashdata('error', 'Interview not found.');
            redirect('createinterviewcontroller');
        }
        $data['title'] = 'Edit Interview';
        $this->load->view('create_interview', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('title', 'Title', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|alpha_dash|max_length[255]|is_unique[interviews.slug.id.' . $id . ']');
        $this->form_validation->set_rules('main_category', 'Main Category', 'required|trim');
        $this->form_validation->set_rules('category', 'Subcategories', 'required|trim');
        $this->form_validation->set_rules('provided', 'Provided By', 'required|trim');
        $this->form_validation->set_rules('interviewee_name', 'Interviewee Name', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('interviewee_designation', 'Interviewee Designation', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('company_name', 'Company Name', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('company_industry', 'Company Industry', 'required|trim|max_length[255]');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['interview'] = $this->Interview_model->get_interview($id);
            $this->load->view('create_interview', $data);
            return;
        }

        $existing_interview = $this->Interview_model->get_interview($id);
        if (!$existing_interview) {
            $this->session->set_flashdata('error', 'Interview not found.');
            redirect('createinterviewcontroller');
        }

        $image_path = $existing_interview['image'];
        if ($this->input->post('remove_image') == '1' && $image_path && file_exists(FCPATH . $image_path)) {
            unlink(FCPATH . $image_path);
            $image_path = null;
        }

        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = './Uploads/interviews/';
            $config['allowed_types'] = 'jpg|jpeg|png|webp';
            $config['max_size'] = 5120;
            $config['file_name'] = time() . '_' . $_FILES['image']['name'];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $data['interview'] = $existing_interview;
                $this->load->view('create_interview', $data);
                return;
            } else {
                if ($image_path && file_exists(FCPATH . $image_path)) {
                    unlink(FCPATH . $image_path);
                }
                $image_path = 'Uploads/interviews/' . $this->upload->data('file_name');
            }
        }

        $provider_logo = '';
        $provided = $this->input->post('provided', TRUE);
        switch ($provided) {
            case 'Business Wire':
                $provider_logo = 'assets/logos/business_wire.png';
                break;
            case 'PR Newswire':
                $provider_logo = 'assets/logos/pr_newswire.png';
                break;
            case 'PRWeb':
                $provider_logo = 'assets/logos/PRWeb_Logo.png';
                break;
            case 'GlobeNewswire':
                $provider_logo = 'assets/logos/globenewswire.png';
                break;
        }

        $data = [
            'title' => $this->input->post('title', TRUE),
            'slug' => $this->input->post('slug', TRUE),
            'main_category' => $this->input->post('main_category', TRUE),
            'category' => $this->input->post('category', TRUE),
            'provided' => $provided,
            'provider_logo' => $provider_logo,
            'image' => $image_path,
            'interviewee_name' => $this->input->post('interviewee_name', TRUE),
            'interviewee_designation' => $this->input->post('interviewee_designation', TRUE),
            'interviewee_bio' => $this->input->post('interviewee_bio', TRUE),
            'company_name' => $this->input->post('company_name', TRUE),
            'company_industry' => $this->input->post('company_industry', TRUE),
            'company_description' => $this->input->post('company_description', TRUE),
            'content' => $this->input->post('content', FALSE),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->Interview_model->update_interview($id, $data)) {
            $this->session->set_flashdata('success', 'Interview updated successfully!');
            redirect('createinterviewcontroller');
        } else {
            $this->session->set_flashdata('error', 'Failed to update interview. Please try again.');
            $data['interview'] = $existing_interview;
            $this->load->view('create_interview', $data);
        }
    }
}