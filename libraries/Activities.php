<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Activities{

    function insert_history($tabel, $isi){

        $CI = & get_instance();  //get instance, access the CI superobject

        $CI->load->model('History_model');
        $CI->load->library('smarty_acl');
        $_history['history_tabel'] =  $tabel;
        $_history['history_detail'] =  $CI->smarty_acl->get_admin()['name'] . $isi;
        $_history['history_user_id'] =  $CI->smarty_acl->get_admin()['id'];
        $CI->History_model->insert($_history);
    }

}

