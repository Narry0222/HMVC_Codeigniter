<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Email_model extends CI_Model {

    function smtp_email($to, $sub, $mes) {
        $cred = $this->db->where('id', 1)->get('integration_passwords')->row();

        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => $cred->server,
            'smtp_port' => 465,
            'smtp_user' => $cred->user,
            'smtp_pass' => $cred->pass,
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $cc = '';

        $this->email->from($cred->user, 'Nursing Care Conference');
        ($to) ? $this->email->to($to) : '';
        ($cc) ? $this->email->cc($cc) : '';
        ($sub) ? $this->email->subject($sub) : '';
        ($mes) ? $this->email->message($mes) : '';
        $send = $this->email->send();
        if ($send) {
            return true;
        } else {
            return false;
        }
    }

    function smtp_email1($to, $sub, $mes) {
        $cred = $this->db->where('id', 2)->get('integration_passwords')->row();

        $this->load->library('email');
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => $cred->server,
            'smtp_port' => 465,
            'smtp_user' => $cred->user,
            'smtp_pass' => $cred->pass,
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $this->email->initialize($config);
        $this->email->set_mailtype("html");
        $this->email->set_newline("\r\n");
        $cc = '';

        $this->email->from($cred->user, 'Nursing Care Conference');
        ($to) ? $this->email->to($to) : '';
        ($cc) ? $this->email->cc($cc) : '';
        ($sub) ? $this->email->subject($sub) : '';
        ($mes) ? $this->email->message($mes) : '';
        $send = $this->email->send();
        if ($send) {
            return true;
        } else {
            return false;
        }
    }

}
