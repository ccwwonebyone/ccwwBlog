<?php
namespace app\index\service;

class RequestClientService{

    public function __construct($url,$headers=[])
    {
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $headers);   //定义header
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);      //不直接输出
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);      //直接跳转重定向
    }

    public function post($post_data = [])
    {
        curl_setopt($this->ch, CURLOPT_POST, 1);
        if($post_data) curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);      //一定要在前面之后执行否则没有效果哦
        return $this;
    }

    public function get()
    {
        curl_setopt($this->ch, CURLOPT_POST, 0);
        return $this;
    }

    public function put($post_data)
    {
        $this->post($post_data);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "put");
        return $this;
    }

    public function patch($post_data)
    {
        $this->post($post_data);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "patch");
        return $this;
    }

    public function delete()
    {
        $this->post();
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "delete");
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
