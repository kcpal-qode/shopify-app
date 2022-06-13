<?php

class Shopify {
    public $shop_url;
    public $access_token;

    public function set_url($url) {
        $this->shop_url = $url;
    }

    public function set_token($token)
    {
        $this->access_token = $token;
    }

    public function get_url() {
        return $this->shop_url;
    }

    public function get_token() {
        return $this->access_token;
    }
}