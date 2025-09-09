<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CreateNewsPostModel extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    private $validCategories = [
        'MarTech' => [
            'Advertising', 'AI', 'Analytics', 'Business Intelligence', 'CDP', 'Communications',
            'Content Management', 'Content Marketing', 'Conversational Marketing', 'CRM',
            'Customer Engagement', 'Customer Experience', 'Cybersecurity', 'Data Management',
            'Digital Asset Management', 'Digital Experience', 'Digital Marketing',
            'Digital Transformation', 'E-commerce', 'Email Marketing', 'Marketing Automation',
            'Marketing Cloud', 'Sales', 'SEO/SEM', 'Social Media', 'Supply Chain Management'
        ],
        'HRTech' => [
            'AI', 'Cybersecurity', 'Diversity, Equity & Inclusion (DEI)', 'Employee Experience',
            'Employee Wellness', 'HCM', 'HR Analytics', 'HR Automation', 'HR Cloud',
            'Learning & Development', 'Payroll & Benefits', 'Remote Work', 'Talent Acquisition',
            'Workforce Management'
        ],
        'Fintech' => [
            'Banking', 'Blockchain', 'Cryptocurrency', 'Decentralized Finance', 'Financial Services',
            'Insurance', 'Investment', 'Lending & Credit', 'Payments & Wallets', 'Security'
        ],
        'Consumer Tech' => [
            '5G Devices', 'AI', 'Audio & Visual Technology', 'Computers', 'Consumer Health',
            'Home Appliances', 'In-home Entertainment', 'Mobile', 'Online Retail', 'Security',
            'Smart Home Technology', 'Social Networking', 'Wearable Technology'
        ]
    ];

    public function getValidSubcategories($main_category) {
        return isset($this->validCategories[$main_category]) ? $this->validCategories[$main_category] : [];
    }

    public function getUserPosts($user_id) {
        $this->db->select('*');
        $this->db->from('news_posts');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPostById($id) {
        $this->db->select('*');
        $this->db->from('news_posts');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert($data) {
        return $this->db->insert('news_posts', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('news_posts', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('news_posts');
    }
}