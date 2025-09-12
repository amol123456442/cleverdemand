<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscribe_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Save email to subscribers table
     * @param string $email
     * @return bool
     */
    public function save_email($email)
    {
        $data = [
            'email' => $email,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('subscribers', $data);
    }

    /**
     * Remove email from subscribers table
     * @param string $email
     * @return bool
     */
    public function remove_email($email)
    {
        // Check if email exists
        $query = $this->db->get_where('subscribers', ['email' => $email]);
        if ($query->num_rows() > 0) {
            $this->db->where('email', $email);
            return $this->db->delete('subscribers');
        } else {
            return false;
        }
    }
}
