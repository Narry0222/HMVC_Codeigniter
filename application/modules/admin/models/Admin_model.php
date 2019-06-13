<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    private $admins_table = 'admins';

    public function check_cred($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $data = $this->db->get($this->admins_table)->row();
        if ($data) {
            $loggedin = array(
                'is_login' => true,
                'firstname' => $data->first_name,
                'lastname' => $data->last_name,
                'email' => $data->email,
                'id' => $data->id
            );
            $this->session->set_userdata($loggedin);
        } else {
            $loggedin = array(
                'is_login' => false,
            );
        }
        return $loggedin;
    }

}
