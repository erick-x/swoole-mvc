<?php
class GenID_Model extends Model{
 private $table = 'id';
    private $db = null;
    
    public function __construct() {
        parent::__construct();
        $this->db = Mysql::load($this->table);
    }
    public function getID(){     
          $this->db->insert($this->table,array("id"=>""));
         return $this->db->get_insertlastid();
    }
    
}