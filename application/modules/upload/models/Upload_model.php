<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model {

    public function buildAmazonUploadConfig($f_type) {
        $config_upload = array();
        switch ($f_type) {
            case "abstract":
                $config_upload['upload_to'] = 'assets/secure/abstract';
                $config_upload['upload_path'] = 'assets/secure/abstract';
                $config_upload['allowed_types'] = 'DOC|DOCX|PDF|TXT|doc|docx|pdf|txt';
                $config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB
                $config_upload['status'] = 1;
                break;

            case "biography":
                $config_upload['upload_to'] = 'assets/secure/biography';
                $config_upload['upload_path'] = 'assets/secure/biography';
                $config_upload['allowed_types'] = 'DOC|DOCX|PDF|TXT|doc|docx|pdf|txt';
                $config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB
                $config_upload['status'] = 1;
                break;

            case "photo":
                $config_upload['upload_to'] = 'assets/secure/photo';
                $config_upload['upload_path'] = 'assets/secure/photo';
                $config_upload['allowed_types'] = 'JPG|JPEG|PNG|jpg|jpeg|png';
                $config_upload['max_size'] = '10240'; // 10240 Kb = 10 MB
                $config_upload['status'] = 1;
                break;

            default:
                $config_upload['upload_to'] = 'assets/secure/default';
                $config_upload['upload_path'] = 'assets/secure/default';
                $config_upload['allowed_types'] = 'JPG|JPEG|PNG|jpg|jpeg|png|DOC|DOCX|PDF|TXT|doc|docx|pdf|txt';
                $config_upload['max_size'] = '10240'; // // 10240 Kb = 10 MB
                break;
        }
        return $config_upload;
    }

    function uploadDocuments($file_field_name, $file_type) {
        $file_array = $_FILES[$file_field_name]['name'];
        $file_array = explode(".", $file_array);
        if (count($file_array) !== 2) {
            if ($file_array[1] == "php") {
                $upl_file_data['success'] = 0;
                $upl_file_data['error'] = ' double extensions are not allowed';
            } else {
                
                $upl_file_data['success'] = 0;
                $upl_file_data['error'] = ' No periods allowed in filename, please try again.';
            }
            return $upl_file_data;
        } else {
            $conf_arr = $this->buildAmazonUploadConfig($file_type);
            $this->load->library('upload');
            $present_file_name = $_FILES[$file_field_name]['name'];
            $extntion_pos = strrpos($present_file_name, '.');
            if ($extntion_pos) {  // Rename the file to eliminate unwnated characters and spaces
                $new_file_name = $file_type . '_' . date('YmdHis'); //substr($oldfile_name, 0, $extntion_pos);
                $new_file_name .= substr($present_file_name, $extntion_pos);
            } else {
                $new_file_name = $present_file_name;
            }
            $conf_arr['file_name'] = $new_file_name;
            $this->upload->initialize($conf_arr);
            if (!$this->upload->do_upload($file_field_name)) {
                $upl_file_data['msg'] = $this->upload->display_errors(); //$error;
                $upl_file_data['file_path'] = '';
                $upl_file_data['file_name'] = '';
                $upl_file_data['success'] = 0;
                $upl_file_data['error'] = ' File upload failed, Try again later';
            } else {
                $data = array('upload_data' => $this->upload->data());
                $upl_file_data['msg'] = 'File upload successfully';
                $upl_file_data['file_path'] = $conf_arr['upload_path'] . '/' . $data['upload_data']['file_name'];
                $upl_file_data['file_name'] = $data['upload_data']['file_name'];
                $upl_file_data['success'] = 1;
            }
            return $upl_file_data;
        }
    }

}

?>