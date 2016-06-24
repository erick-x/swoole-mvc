<?php

class Curl_Lib {

    private $_handles;

    public function __construct() {
        $this->_handles = curl_init();
    }

    public function getContents($url, $method = 'GET', $param = array(), $timeout = 10) {
        curl_setopt($this->_handles, CURLOPT_URL, $url);
        curl_setopt($this->_handles, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->_handles, CURLOPT_CONNECTTIMEOUT, 1);
        curl_setopt($this->_handles, CURLOPT_TIMEOUT, $timeout);
        if ($method == 'GET') {
            curl_setopt($this->_handles, CURLOPT_HEADER, 0);
        } elseif ($method == 'POST') {
            curl_setopt($this->_handles, CURLOPT_POST, 1);
            curl_setopt($this->_handles, CURLOPT_POSTFIELDS, $param);
        }
        return curl_exec($this->_handles);
    }

    public function getInfo() {
        return curl_error($this->_handles);
    }

    public function getErrno() {
        return curl_errno($this->_handles);
    }
    public function __destruct() {
        curl_close($this->_handles);
    }

}
