<?php

/* 
 * 首页
 */

class Index_Controller extends Module_Lib{
 

    public function index(){
        if(!User_Service::checkLogin()){
            header("Location:/user/login");
            exit();
        }
        $this->load_view("index");
    }
    
    public function error(){
        $this->load_view('error');
    }
   
    public function socketerror() {
        $this->load_view('socket_error');
    }
}

