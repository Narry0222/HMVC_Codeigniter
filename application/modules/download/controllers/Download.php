<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Download extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('download');
        $this->load->library('user_agent');
    }

    public function complaint_message($file = "") {
        if (($file) && ($this->session->userdata('is_logged_in'))) {
            $data = $this->db->where('attachment', $file)->get('complaint_message')->row();
            ($data) ? force_download($data->attachment_path, NULL) : redirect($this->agent->referrer());
        } else {
            redirect($this->agent->referrer());
        }
    }

}
