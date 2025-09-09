<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['form', 'url']);
        $this->load->database();
    }

    public function login() {
        if ($this->session->userdata('logged_in')) {
            redirect('createpost'); // Redirect to createpost if already logged in
        }
        $this->load->view('auth/login');
    }

    public function register() {
        if ($this->session->userdata('logged_in')) {
            redirect('createpost'); // Redirect to createpost if already logged in
        }
        $this->load->view('auth/register');
    }

    public function authenticate() {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/login');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            try {
                $user = $this->User_model->validate_user($username, $password);

                if ($user) {
                    $session_data = [
                        'user_id' => $user['id'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => TRUE
                    ];
                    $this->session->set_userdata($session_data);
                    $this->session->set_flashdata('success', 'Login successful!');
                    log_message('debug', 'User ' . $username . ' logged in successfully.');
                    redirect('createpost'); // Redirect to createpost after successful login
                } else {
                    $this->session->set_flashdata('error', 'Invalid username or password.');
                    log_message('error', 'Failed login attempt for username: ' . $username);
                    redirect('auth/login');
                }
            } catch (Exception $e) {
                $this->session->set_flashdata('error', 'An error occurred during authentication.');
                log_message('error', 'Authentication error: ' . $e->getMessage());
                redirect('auth/login');
            }
        }
    }

    public function save_register() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('role', 'Role', 'required|in_list[user,admin]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('auth/register');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role'),
                'created_at' => date('Y-m-d H:i:s')
            ];

            log_message('debug', 'Registration data: ' . print_r($data, TRUE));

            try {
                if ($this->User_model->create_user($data)) {
                    $this->session->set_flashdata('success', 'Registration successful! Please login.');
                    redirect('auth/login');
                } else {
                    $db_error = $this->db->error();
                    $this->session->set_flashdata('error', 'Registration failed: ' . $db_error['message']);
                    redirect('auth/register');
                }
            } catch (Exception $e) {
                $this->session->set_flashdata('error', 'An error occurred during registration.');
                log_message('error', 'Registration error: ' . $e->getMessage());
                redirect('auth/register');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Logged out successfully.');
        redirect('auth/login');
    }
}