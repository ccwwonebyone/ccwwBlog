<?php
namespace app\index\service;

class RequestClientService{

    public function __construct($url,$headers=[])
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);//定义header
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1); 
    }

    public function post()
    {
        curl_setopt($this->ch, CURLOPT_POST, 1);
        return $this;
    }

    public function get()
    {
        curl_setopt($this->ch, CURLOPT_POST, 0);
        return $this;
    }

    public function put()
    {
        $this->post();
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "put");
        return $this;
    }

    public function patch()
    {
        $this->post();
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "patch");
        return $this;
    }

    public function delete()
    {
        $this->post();
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "delete");
        return $this;
    }

    public function sendData($post_data)
    {
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);
        return $this;
    }

    public function rcExec()
    {
        return curl_exec($this->ch);
    }

    public function __destruct()
    {
        curl_close($this->ch);      //关闭连接
    }
}
