<?php
class AddConfig_Model extends Model{
 private $table = 'showip';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function insert($data){        
        return $this->db->insert($this->table,$data);
    }
    
}