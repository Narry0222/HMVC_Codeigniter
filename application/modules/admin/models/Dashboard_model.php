<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    private $users_table = 'registrations';
    private $contact_table = 'contact';
    private $payment_table = 'payment';

    public function removeQueryVal($qry, $qryKey) {
        $qry_new = '';
        $qryval = array();
        if (strpos($qry, $qryKey) === false) {
            $qry_new .= ($qry) ? '?' . $qry : '';
        } else {
            if (strlen($qry) > 1) {
                $qry = (strpos($qry, "?") !== false) ? substr($qry, 1) : $qry;
                $qryArr = (strpos($qry, '&') !== false) ? explode("&", $qry) : $qry;
                if (is_array($qryArr)) {
                    foreach ($qryArr as $val) {
                        if (strpos($val, $qryKey . '=') === false) {
                            $qryPair = explode('=', $val);
                            $qry_new .= '&' . $qryPair[0] . '=' . $qryPair[1];
                        }
                    }
                }
                $qry_new = substr($qry_new, 1);
                $qry_new = ($qry_new) ? '?' . $qry_new : '';
            }
        }
        return $qry_new;
    }
    
    public function getUserCount() {
        return $this->db->select('count(*) as ttl_rows')->get($this->users_table)->row();
    }
    
    public function getContactCount() {
        return $this->db->select('count(*) as ttl_rows')->get($this->contact_table)->row();
    }

    public function getMembers($search) {
        $name = $search['name'];
        $email = $search['email'];
        $phone = $search['phone'];
        $category = $search['category'];
        $venue = $search['venue'];
        $start = $search['start'];
        $limit = $search['limit'];
        $this->db->select('u.*, p.order_status');
        $this->db->from($this->users_table . ' as u');
        $this->db->join($this->payment_table . ' as p', 'p.order_id = u.id', 'left');
        ($name) ? $this->db->like('CONCAT(u.firstname," ", u.lastname)', $name, 'after') : '';
        ($email) ? $this->db->like('u.email_id', $email, 'after') : '';
        ($phone) ? $this->db->like('u.mobile', $phone, 'after') : '';
        ($category) ? $this->db->where('u.category', $category) : '';
        ($venue) ? $this->db->where('u.venue', $venue) : '';
        $this->db->order_by('u.id', 'DESC');
        $this->db->limit($limit, $start);
        $data['members'] = $this->db->get()->result();
        $data['ttl_rows'] = $this->getMembersCount($search);
        return $data;
    }

    public function getMembersCount($search) {
        $name = $search['name'];
        $email = $search['email'];
        $phone = $search['phone'];
        $category = $search['category'];
        $venue = $search['venue'];
        $this->db->select('count(*) as ttl_rows');
        $this->db->from($this->users_table);
        ($name) ? $this->db->like('CONCAT(firstname," ", lastname)', $name, 'after') : '';
        ($email) ? $this->db->like('email_id', $email, 'after') : '';
        ($phone) ? $this->db->like('mobile', $phone, 'after') : '';
        ($category) ? $this->db->where('category', $category) : '';
        ($venue) ? $this->db->where('venue', $venue) : '';
        $count = $this->db->get()->row();
        return $count->ttl_rows;
    }

    public function getMemberById($user_id) {
        $this->db->select('u.*, p.order_status, p.tracking_id, p.status_message');
        $this->db->from($this->users_table . ' as u');
        $this->db->join($this->payment_table . ' as p', 'p.order_id = u.id', 'left');
        $this->db->where('u.id', $user_id);
        return $this->db->get()->row();
    }

    public function getContacts($search) {
        $name = $search['name'];
        $email = $search['email'];
        $phone = $search['phone'];
        $start = $search['start'];
        $limit = $search['limit'];
        $this->db->select('*');
        $this->db->from($this->contact_table);
        ($name) ? $this->db->like('name', $name, 'after') : '';
        ($email) ? $this->db->like('email', $email, 'after') : '';
        ($phone) ? $this->db->like('phone', $phone, 'after') : '';
        $this->db->order_by('id', 'DESC');
        $this->db->limit($limit, $start);
        $data['contacts'] = $this->db->get()->result();
        $data['ttl_rows'] = $this->getContactsCount($search);
        return $data;
    }

    public function getContactsCount($search) {
        $name = $search['name'];
        $email = $search['email'];
        $phone = $search['phone'];
        $this->db->select('count(*) as ttl_rows');
        $this->db->from($this->contact_table);
        ($name) ? $this->db->like('name', $name, 'after') : '';
        ($email) ? $this->db->like('email', $email, 'after') : '';
        ($phone) ? $this->db->like('phone', $phone, 'after') : '';
        $count = $this->db->get()->row();
        return $count->ttl_rows;
    }

    public function getContactById($user_id) {
        return $this->db->where('id', $user_id)->get($this->contact_table)->row();
    }

}
