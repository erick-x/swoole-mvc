<?php

class Mongodloid_Exception extends Exception {
    
    public function __construct($message) {
        
        __log_message($message,'mongodloid');
    }
}