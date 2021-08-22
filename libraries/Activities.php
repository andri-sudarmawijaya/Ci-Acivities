<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Activities{

    /**
     * Register
     *
     * @param string $tabel
     * @param string $info
     */
    public function log_activities($param){

        $this->CI = & get_instance();  //get instance, access the CI superobject

        $this->CI->load->model('Activities_model');
        $this->CI->load->library('smarty_acl');

        $activities['activities_tabel'] =  $param['tabel'];
        $activities['activities_info'] =  $param['info'];
        $activities['activities_detail'] =  $this->CI->smarty_acl->get_admin()['name'] . $param['content'];
        $activities['activities_user_id'] =  $this->CI->smarty_acl->get_admin()['id'];
        $this->CI->Activities_model->insert($activities);
    }

}

