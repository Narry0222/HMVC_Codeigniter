<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->valid_user();
        $this->load->library('pagination');
        $this->load->model('dashboard_model', 'my_model');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    public function index() {
        $data['title'] = 'Dashboard';
        $data['userCount'] = $this->my_model->getUserCount();
        $data['contactCount'] = $this->my_model->getContactCount();
        $this->load->view('dashboard', $data);
    }

    public function members() {
        $data['title'] = "Aquilus Members";
        $data['start'] = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $data['limit'] = ($this->input->get('limit')) ? $this->input->get('limit') : 25;
        $data['starting'] = ($this->input->get('page')) ? ($data['start'] - 1 ) * $data['limit'] : 0;
        $data['name'] = ($this->input->get('name')) ? $this->input->get('name') : '';
        $data['email'] = ($this->input->get('email')) ? $this->input->get('email') : '';
        $data['phone'] = ($this->input->get('phone')) ? $this->input->get('phone') : '';
        $data['category'] = ($this->input->get('category')) ? $this->input->get('category') : '';
        $data['venue'] = ($this->input->get('venue')) ? $this->input->get('venue') : '';
        $search_options = array(
            'start' => $data['starting'],
            'limit' => $data['limit'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'category' => $data['category'],
            'venue' => $data['venue']
        );
        $members = $this->my_model->getMembers($search_options);
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_global_url_suffix'] = FALSE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $members['ttl_rows'];
        $config['per_page'] = $data['limit'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $QUERY_STRING = $this->my_model->removeQueryVal($_SERVER['QUERY_STRING'], 'page');
        $config['base_url'] = base_url('admin/members' . $QUERY_STRING);
        $config['suffix'] = '';
        $config['first_url'] = '';
        $this->pagination->initialize($config);
        $data['ttl_rows'] = $members['ttl_rows'];
        $data['members'] = $members['members'];
        $data['pagination'] = $this->pagination->create_links();
        $data['querystring'] = $QUERY_STRING;
        $this->load->view('members', $data);
    }

    public function contacts() {
        $data['title'] = "Contacts";
        $data['start'] = ($this->input->get('page')) ? $this->input->get('page') : 0;
        $data['limit'] = ($this->input->get('limit')) ? $this->input->get('limit') : 25;
        $data['starting'] = ($this->input->get('page')) ? ($data['start'] - 1 ) * $data['limit'] : 0;
        $data['name'] = ($this->input->get('name')) ? $this->input->get('name') : '';
        $data['email'] = ($this->input->get('email')) ? $this->input->get('email') : '';
        $data['phone'] = ($this->input->get('phone')) ? $this->input->get('phone') : '';
        $search_options = array(
            'start' => $data['starting'],
            'limit' => $data['limit'],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone']
        );
        $contacts = $this->my_model->getContacts($search_options);
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['use_global_url_suffix'] = FALSE;
        $config['query_string_segment'] = 'page';
        $config['total_rows'] = $contacts['ttl_rows'];
        $config['per_page'] = $data['limit'];
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $QUERY_STRING = $this->my_model->removeQueryVal($_SERVER['QUERY_STRING'], 'page');
        $config['base_url'] = base_url('admin/contacts' . $QUERY_STRING);
        $config['suffix'] = '';
        $config['first_url'] = '';
        $this->pagination->initialize($config);
        $data['ttl_rows'] = $contacts['ttl_rows'];
        $data['contacts'] = $contacts['contacts'];
        $data['pagination'] = $this->pagination->create_links();
        $data['querystring'] = $QUERY_STRING;
        $this->load->view('contacts', $data);
    }

    public function viewContact($id = "") {
        $data['title'] = 'Contact View';
        $data['profile'] = $this->my_model->getContactById($id);
        $this->load->view('viewContact', $data);
    }

    public function viewMember($id = "") {
        $data['title'] = 'Member View';
        $data['profile'] = $this->my_model->getMemberById($id);
        $this->load->view('viewMember', $data);
    }

    public function valid_user() {
        if (($this->session->userdata('id')) && ($this->session->userdata('is_login'))) {
            return true;
        } else {
            redirect(base_url('admin'));
        }
    }

}
