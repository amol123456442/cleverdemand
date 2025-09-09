<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbtest extends CI_Controller {

    public function index()
    {
        $query = $this->db->query("SELECT * FROM users");

        echo "<h3>Dummy User Data:</h3><pre>";
        print_r($query->result());
        echo "</pre>";
    }
}
