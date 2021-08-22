<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Activities{

    /**
     * Activities
     *
     * @param string $tabel
     * @param string $info
     * @param string $content
     *
     */
    public function log($param = array()){

        $this->CI = & get_instance();  //get instance, access the CI superobject

        $this->CI->load->model('Activities_model');
        $this->CI->load->library('smarty_acl');

        $activities['activities_tabel'] =  $param['tabel'];
        $activities['activities_info'] =  $param['info'];
        $activities['activities_detail'] =  $this->CI->smarty_acl->get_admin()['name'] . $param['content'];
        $activities['activities_user_id'] =  $this->CI->smarty_acl->get_admin()['id'];
        $this->CI->Activities_model->insert($activities);
    }

    /**
     * Telegram
     *
     * @var string $botToken
     * @var string $chatId
     * @var string $message
     *
     */
    public function telegram($var = array()){

        /*
         * defined you telegram bot and chatId here as default if you don want to declare it in your controller.
         */
        $botToken = $var['botToken'] ?? "XXXXXXXXXX:YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY";
        $chatId = $var['chatId'] ?? -ZZZZZZZZZ;  //** ===>>>NOTE: this chatId MUST be the chat_id of a person or group, NOT another bot chatId !!!**


        $website="https://api.telegram.org/bot".$botToken;
        $params=[
            'chat_id'=>$chatId,
            'text'=> $var['content'] ?? 'This is my message !!!',
        ];
        echo '<pre>';
        print_r($var);
        echo '<br />-<br />-<br />';
        print_r($params);
        echo '</pre>';

        $ch = curl_init($website . '/sendMessage');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
