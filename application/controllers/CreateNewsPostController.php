<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CreateNewsPostController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'upload']);
        $this->load->helper(['url', 'text', 'security']);
        $this->load->database();
        $this->load->model('CreateNewsPostModel');

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

    public function index()
    {
        $data['username'] = $this->session->userdata('username');
        $data['role'] = $this->session->userdata('role');
        $data['form_data'] = $this->session->flashdata('form_data') ?: [];
        $this->load->view('createpost', $data);
    }

    public function createpost($id = null)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Session expired. Please login again.');
            redirect('auth/login');
        }

        try {
            if (!isset($this->CreateNewsPostModel)) {
                throw new Exception('CreateNewsPostModel not loaded.');
            }
            $data['posts'] = $this->CreateNewsPostModel->getUserPosts($user_id);
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->session->userdata('role');

            if ($id) {
                $data['post'] = $this->CreateNewsPostModel->getPostById($id);
                if (!$data['post'] || $data['post']['user_id'] != $user_id) {
                    $this->session->set_flashdata('error', 'Post not found or unauthorized.');
                    redirect('createpost');
                }
            } else {
                $data['post'] = null;
            }

            $data['form_data'] = $this->session->flashdata('form_data') ?: [];
            $this->load->view('createpost', $data);
        } catch (Exception $e) {
            log_message('error', 'Error in createpost: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'An error occurred while loading the page.');
            redirect('createpost');
        }
    }

   public function store()
{
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        $this->session->set_flashdata('error', 'Session expired. Please login again.');
        redirect('auth/login');
    }

    $this->form_validation->set_rules('title', 'Title', 'required|trim');
    $this->form_validation->set_rules('slug', 'Slug', 'required|trim|regex_match[/^[a-z0-9-]+$/]|is_unique[news_posts.slug]', [
        'regex_match' => 'The %s must contain only lowercase letters, numbers, and hyphens.'
    ]);
    $this->form_validation->set_rules('main_category', 'Main Category', 'required|in_list[MarTech,HRTech,Fintech,Consumer Tech]', [
        'in_list' => 'Please select a valid main category.'
    ]);
    $this->form_validation->set_rules('category', 'Subcategories', 'required|callback_validate_subcategories');
    $this->form_validation->set_rules('content', 'Content', 'required|trim');
    $this->form_validation->set_rules('provided', 'Provided By', 'required|in_list[Business Wire,PR Newswire,PRWeb,GlobeNewswire]', [
        'in_list' => 'Please select a valid provider.'
    ]);

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', validation_errors());
        $this->session->set_flashdata('form_data', $this->input->post());
        redirect('createpost');
    }

    $upload_path = FCPATH . 'Uploads/';
    if (!is_dir($upload_path)) {
        if (!mkdir($upload_path, 0777, true)) {
            log_message('error', 'Failed to create upload directory: ' . $upload_path);
            $this->session->set_flashdata('error', 'Server error: Unable to create upload directory.');
            redirect('createpost');
        }
    }

    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif|webp';
    $config['max_size'] = 5120; // 5 MB
    $config['max_width'] = 5000;
    $config['max_height'] = 5000;
    $config['encrypt_name'] = TRUE; // Optional: To avoid filename conflicts

    $this->upload->initialize($config);

    $imagePath = 'assets/default.jpg'; // Default image
    if (!empty($_FILES['image']['name'])) {
        if ($this->upload->do_upload('image')) {
            $uploadData = $this->upload->data();
            $imagePath = 'Uploads/' . $uploadData['file_name']; // Save relative path
        } else {
            log_message('error', 'Upload error: ' . $this->upload->display_errors('', ''));
            $this->session->set_flashdata('error', $this->upload->display_errors());
            $this->session->set_flashdata('form_data', $this->input->post());
            redirect('createpost');
        }
    }

    $provided = $this->input->post('provided');
    $logoPath = '';
    switch ($provided) {
        case 'Business Wire':
            $logoPath = 'assets/logos/business_wire.png';
            break;
        case 'PR Newswire':
            $logoPath = 'assets/logos/pr_newswire.png';
            break;
        case 'PRWeb':
            $logoPath = 'assets/logos/PRWeb_Logo.png';
            break;
        case 'GlobeNewswire':
            $logoPath = 'assets/logos/globenewswire.png';
            break;
    }

    $data = [
        'title'        => $this->input->post('title'),
        'slug'         => url_title($this->input->post('title'), 'dash', TRUE),
        'main_category' => $this->input->post('main_category'),
        'category'     => $this->input->post('category'),
        'provided'     => $this->input->post('provided'),
        'content'      => $this->input->post('content'),
        'user_id'      => $user_id,
        'image'        => $imagePath,
    ];

    try {
        if ($this->CreateNewsPostModel->insert($data)) {
            $this->session->set_flashdata('success', 'News post created successfully!');
            redirect('createpost');
        } else {
            log_message('error', 'Database insert failed for news_posts');
            $this->session->set_flashdata('error', 'Failed to create post. Please try again.');
            redirect('createpost');
        }
    } catch (Exception $e) {
        log_message('error', 'Error in store: ' . $e->getMessage());
        $this->session->set_flashdata('error', 'An error occurred while creating the post.');
        redirect('createpost');
    }
}

    public function update($id)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Session expired. Please login again.');
            redirect('auth/login');
        }

        $postData = $this->CreateNewsPostModel->getPostById($id);
        if (!$postData || $postData['user_id'] != $user_id) {
            $this->session->set_flashdata('error', 'Post not found or unauthorized.');
            redirect('createpost');
        }

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('main_category', 'Main Category', 'required|in_list[MarTech,HRTech,Fintech,Consumer Tech]', [
            'in_list' => 'Please select a valid main category.'
        ]);
        $this->form_validation->set_rules('category', 'Subcategories', 'required|callback_validate_subcategories');
        $this->form_validation->set_rules('provided', 'Provided By', 'required|in_list[Business Wire,PR Newswire,PRWeb,GlobeNewswire]', [
            'in_list' => 'Please select a valid provider.'
        ]);
        $this->form_validation->set_rules('content', 'Content', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->session->set_flashdata('form_data', $this->input->post());
            redirect('createpost/createpost/' . $id);
        }

        $upload_path = FCPATH . 'Uploads/';
        if (!is_dir($upload_path)) {
            if (!mkdir($upload_path, 0777, true)) {
                log_message('error', 'Failed to create upload directory: ' . $upload_path);
                $this->session->set_flashdata('error', 'Server error: Unable to create upload directory.');
                redirect('createpost/createpost/' . $id);
            }
        }

        $imagePath = $postData['image'];
        if (!empty($_FILES['image']['name'])) {
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|jpeg|png|gif|jfif|webp';
            $config['max_size'] = 2048;
            $config['max_width'] = 1920;
            $config['max_height'] = 1080;
            $this->upload->initialize($config);

            if ($this->upload->do_upload('image')) {
                if (file_exists($imagePath) && $imagePath && $imagePath !== '') {
                    unlink($imagePath);
                }
                $uploadData = $this->upload->data();
                $imagePath = 'Uploads/' . $uploadData['file_name'];
            } else {
                log_message('error', 'Upload error: ' . $this->upload->display_errors('', ''));
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('createpost/createpost/' . $id);
            }
        }

        $provided = $this->input->post('provided');
        $logoPath = $postData['provider_logo'];
        switch ($provided) {
            case 'Business Wire':
                $logoPath = 'assets/logos/business_wire.png';
                break;
            case 'PR Newswire':
                $logoPath = 'assets/logos/pr_newswire.png';
                break;
            case 'PRWeb':
                $logoPath = 'assets/logos/PRWeb_Logo.png';
                break;
            case 'GlobeNewswire':
                $logoPath = 'assets/logos/globenewswire.png';
                break;
        }

        $new_slug = $this->input->post('title') === $postData['title']
            ? $postData['slug']
            : url_title($this->input->post('title'), 'dash', TRUE);

        if ($new_slug !== $postData['slug']) {
            $this->db->where('slug', $new_slug);
            $this->db->where('id !=', $id);
            if ($this->db->count_all_results('news_posts') > 0) {
                $this->session->set_flashdata('error', 'Slug already exists. Please modify the title.');
                $this->session->set_flashdata('form_data', $this->input->post());
                redirect('createpost/createpost/' . $id);
            }
        }

        $data = [
            'title' => $this->input->post('title'),
            'slug' => $new_slug,
            'main_category' => $this->input->post('main_category'),
            'category' => $this->input->post('category'),
            'provided' => $provided,
            'content' => html_escape($this->input->post('content')),
            'image' => $imagePath,
            'provider_logo' => $logoPath,
            'updated_at' => $this->getCurrentTimestamp()
        ];

        try {
            if ($this->CreateNewsPostModel->update($id, $data)) {
                $this->session->set_flashdata('success', 'Post updated successfully!');
                redirect('allposts');
            } else {
                log_message('error', 'Database update failed for news_posts ID: ' . $id);
                $this->session->set_flashdata('error', 'Failed to update post. Please try again.');
                redirect('createpost/createpost/' . $id);
            }
        } catch (Exception $e) {
            log_message('error', 'Error in update: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'An error occurred while updating the post.');
            redirect('createpost/createpost/' . $id);
        }
    }

    public function validate_subcategories($category)
    {
        $main_category = $this->input->post('main_category');
        if (!$main_category) {
            $this->form_validation->set_message('validate_subcategories', 'Please select a main category.');
            return FALSE;
        }

        if (!method_exists($this->CreateNewsPostModel, 'getValidSubcategories')) {
            log_message('error', 'getValidSubcategories method not found in CreateNewsPostModel');
            $this->form_validation->set_message('validate_subcategories', 'System error: Category validation unavailable.');
            return FALSE;
        }

        static $validSubcategories = null;
        if ($validSubcategories === null) {
            $validSubcategories = $this->CreateNewsPostModel->getValidSubcategories($main_category);
        }

        if (empty($validSubcategories)) {
            $this->form_validation->set_message('validate_subcategories', 'Invalid main category: ' . html_escape($main_category));
            return FALSE;
        }

        $selectedCategories = array_map('trim', explode(',', $category));
        foreach ($selectedCategories as $cat) {
            if (!in_array($cat, $validSubcategories)) {
                $this->form_validation->set_message('validate_subcategories', 'Invalid subcategory: ' . html_escape($cat) . ' for ' . html_escape($main_category));
                return FALSE;
            }
        }
        return TRUE;
    }

    public function delete($id)
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            echo json_encode(['status' => 'error', 'message' => 'Unauthorized']);
            return;
        }

        try {
            $postData = $this->CreateNewsPostModel->getPostById($id);
            if ($postData && $postData['user_id'] == $user_id) {
                if ($postData['image'] && file_exists($postData['image'])) {
                    unlink($postData['image']);
                }
                if ($this->CreateNewsPostModel->delete($id)) {
                    echo json_encode(['status' => 'success', 'message' => 'Post deleted successfully']);
                } else {
                    log_message('error', 'Database delete failed for news_posts ID: ' . $id);
                    echo json_encode(['status' => 'error', 'message' => 'Failed to delete post']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Post not found or unauthorized']);
            }
        } catch (Exception $e) {
            log_message('error', 'Error in delete: ' . $e->getMessage());
            echo json_encode(['status' => 'error', 'message' => 'An error occurred while deleting the post']);
        }
    }

    public function allposts()
    {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            $this->session->set_flashdata('error', 'Session expired. Please login again.');
            redirect('auth/login');
        }

        try {
            $data['posts'] = $this->CreateNewsPostModel->getUserPosts($user_id);
            $data['username'] = $this->session->userdata('username');
            $data['role'] = $this->session->userdata('role');
            $this->load->view('createnewspost/allposts', $data);
        } catch (Exception $e) {
            log_message('error', 'Error in allposts: ' . $e->getMessage());
            $this->session->set_flashdata('error', 'An error occurred while loading posts.');
            redirect('createpost');
        }
    }
}
