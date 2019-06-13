<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model', 'my_model');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('login');
        } else {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $data = $this->my_model->check_cred($email, $password);
            if ($data['is_login']) {
                redirect(base_url('admin/dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Email or Password is incorrect');
                redirect(base_url('admin'));
            }
        }
    }

    public function logout() {
        $loggedout = array('is_login', 'firstname', 'lastname', 'email', 'id');
        $this->session->unset_userdata($loggedout);
        redirect(base_url('admin'));
    }

}
