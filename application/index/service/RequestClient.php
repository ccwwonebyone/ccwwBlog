<?php
namespace app\index\service;

class RequestClient{

    public function __construct($url,$headers)
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $header);//定义header
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
    }

    public function post($post_data)
    {
        curl_setopt($this->ch, CURLOPT_POST, 1);
    }

    public function get()
    {
        curl_setopt($this->ch, CURLOPT_POST, 0);
    }

    public function put()
    {
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "put");
    }

    public function patch()
    {
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "patch");
    }

    public function delete()
    {
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "delete");
    }

    public function sendData($post_data)
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);
    }

    public function rcExec($value='')
    {
        return curl_exec($this->ch);
    }

    public function __destruct()
    {
        curl_close($this->ch);      //关闭连接
    }
}
