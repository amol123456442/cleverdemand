<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Ensure database is loaded
    }

    public function validate_user($username, $password) {
        $query = $this->db->get_where('users', ['username' => $username]);
        $user = $query->row_array();
        
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    public function create_user($data) {
        try {
            $result = $this->db->insert('users', $data);
            if (!$result) {
                log_message('error', 'User insertion failed: ' . $this->db->error()['message']);
            }
            return $result;
        } catch (Exception $e) {
            log_message('error', 'Exception during user insertion: ' . $e->getMessage());
            return false;
        }
    }
}