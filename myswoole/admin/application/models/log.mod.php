<?php

/* 
 * 处理log日志的model
 */

class Log_Model extends Model{
    
    private $mongo = null;
    private $database = 'db_mt_log';
    private $fileds = array('timestamp','step','server_name','controller','action','channel1','channel2','openuid','uid','ip','errcode','content');
    public function __construct() {
        parent::__construct();
    }
    
    
    public function getAllLogs(){
        $this->mongo = Mongo_Lib::load('debug');
        //var_dump($this->mongo);exit();
        $this->mongo->selectCollection('debug');
        //'errcode<0'
        $data = $this->mongo->find(array('errcode'=>array('$lt' => 0)));
        
        return $data;
    }
    
    /**
     * 根据时间查询数据
     * @param type $start   开始时间
     * @param type $end     结束时间
     * @return type 返回满足条件的数据
     */
    public function getDebugByDate($start,$end){
        $this->mongo = Mongo_Lib::load('debug');
        
        $this->mongo->selectCollection('debug');
        
       $data =  $this->mongo->find(array('timestamp'=>array('$lt'=>$start,'$gt'=>$end)));
       // $sQuery = 'timestamp>='.$start.' AND timestamp<'.$end;
        /*$cursor = $collection->query($sQuery)->cursor();
        $data = array();
        foreach($cursor as $entity){
            $data[] = $entity->getRawData();
        }
        */
        return $data;
    }
    
    public function getDegbugByCondition(){
        
    }

    /**
    * 
    * @param type $table 表名
    * @param type $data  插入表格的数据
    */
    public function insert($table,$data){
        $db = $this->connnection->getDb($this->database);
        $collection = $db->getCollection($table);
       /*
        $keys = array_keys($data);
        $collection->ensureIndex($keys);
        */
        //$values = new Mongodloid_ID();
        $entity = new Mongodloid_Entity($data,$collection);
        $collection->save($entity);
    }
    
}
