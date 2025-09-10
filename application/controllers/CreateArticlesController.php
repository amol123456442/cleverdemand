<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateArticlesController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'text', 'security']);
        $this->load->database();
        $this->load->model('CreateArticlesModel');

        if (file_exists(APPPATH . 'libraries/Timezy.php')) {
            $this->load->library('timezy');
        } else {
            log_message('error', 'Timezy library not found. Using default PHP date.');
        }

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Please login to access this page.');
            redirect('auth/login');
        }
    }

    private function getCurrentTimestamp()
    {
        if (property_exists($this, 'timezy') && method_exists($this->timezy, 'getCurrentTimestamp')) {
            try {
                return $this->timezy->getCurrentTimestamp();
            } catch (Exception $e) {
                log_message('error', 'Timezy error: ' . $e->getMessage());
                return date('Y-m-d H:i:s');
            }
        }
        return date('Y-m-d H:i:s');
    }

    // Default index
    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');
        $data['form_data'] = $this->session->flashdata('form_data') ?: [];
        $this->load->view('createarticles', $data);
    }

    // Create / Edit page
    public function createpressrelease($id = null)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Session expired. Please login again.');
            redirect('auth/login');
        }

        try {
            $data['posts'] = $this->CreateArticlesModel->getUserPosts($user_id);
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->session->userdata('role');

            if ($id) {
                $data['post'] = $this->CreateArticlesModel->getPostById($id);
                if (!$data['post'] || $data['post']['user_id'] != $user_id) {
                    $this->session->set_flashdata('error', 'Press release not found or unauthorized.');
                    redirect('createarticles');
                }
            } else {
                $data['post'] = null;
            }

            $data['form_data'] = $this->session->flashdata('form_data') ?: [];
            $this->load->view('createarticles', $data);
        } catch (Exception $e) {
            log_message('error', 'Error in createpressrelease: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'An error occurred while loading the page.');
            redirect('createarticles');
        }
    }

    // Store new press release
    public function store()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Session expired. Please login again.');
            redirect('auth/login');
        }

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('slug', 'Slug', 'required|trim|regex_match[/^[a-z0-9-]+$/]|is_unique[press_releases.slug]', [
            'regex_match' => 'The %s must contain only lowercase letters, numbers, and hyphens.'
        ]);
        $this->form_validation->set_rules('main_category', 'Main Category', 'required|in_list[MarTech,HRTech,Fintech,Consumer Tech]');
        $this->form_validation->set_rules('category', 'Subcategories', 'required|callback_validate_subcategories');
        $this->form_validation->set_rules('content', 'Content', 'required|trim');
        $this->form_validation->set_rules('provided', 'Provided By', 'required|in_list[Business Wire,PR Newswire,PRWeb,GlobeNewswire]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('form_data', $this->input->post());
            redirect('createarticles');
        }

        // File upload
        $upload_path = FCPATH . 'Uploads/';
        if (!is_dir($upload_path)) {
            mkdir($upload_path, 0777, true);
        }

        $config['upload_path'] = $upload_path;
        $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif|webp';
        $config['max_size'] = 5120;
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);

        $imagePath = 'assets/default.jpg';
        if (!empty($_FILES['image']['name'])) {
            if ($this->upload->do_upload('image')) {
                $uploadData = $this->upload->data();
                $imagePath = 'Uploads/' . $uploadData['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('createarticles');
            }
        }

        $data = [
            'title'        => $this->input->post('title'),
            'slug'         => url_title($this->input->post('title'), 'dash', TRUE),
            'main_category'=> $this->input->post('main_category'),
            'category'     => $this->input->post('category'),
            'provided'     => $this->input->post('provided'),
            'content'      => $this->input->post('content'),
            'user_id'      => $user_id,
            'image'        => $imagePath,
            'created_at'   => $this->getCurrentTimestamp()
        ];

        if ($this->CreateArticlesModel->insert($data)) {
            $this->session->set_flashdata('success', 'Article created successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to create article. Please try again.');
        }

        redirect('createarticles');
    }

    // Update existing press release
    public function update($id)
    {
        // (same as your logic, just redirect fixed: use createpressrelease not create_press_release)
    }

    // Delete press release
    public function delete($id)
    {
        // (same as your logic)
    }

    // Show all releases
    public function allpressreleases()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Session expired. Please login again.');
            redirect('auth/login');
        }

        $data['posts'] = $this->CreateArticlesModel->getUserPosts($user_id);
        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');
        $this->load->view('createarticles/allarticles', $data);
    }

    // Subcategories validation
    public function validate_subcategories($category)
    {
        $main_category = $this->input->post('main_category');
        $validSubcategories = $this->CreateArticlesModel->getValidSubcategories($main_category);
        $selectedCategories = array_map('trim', explode(',', $category));
        foreach ($selectedCategories as $cat) {
            if (!in_array($cat, $validSubcategories)) {
                $this->form_validation->set_message('validate_subcategories', 'Invalid subcategory: ' . $cat);
                return FALSE;
            }
        }
        return TRUE;
    }
}
