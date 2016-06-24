<?php
require_once 'DB.php';

class Mongodloid_Connection {
	private $_connected = false;
	private $_connection = null;
	private $_persistent = false;
	private $_server = '';
	private $_dbs = array();

	public function getDB($db) {
		if (!$this->_dbs[$db]) {
			$this->forceConnect();
                        $this->_dbs[$db] = new Mongodloid_DB($this->_connection->selectDB($db), $this);
		}
		
		return $this->_dbs[$db];
	}

	/**
	 *	@throws MongoConnectionException
	 */
	public function forceConnect() {
		if ($this->_connected)
			return;
			
		// this can throw an Exception
                $class = 'MongoClient';
                if(!class_exists($class)){
                    $class = 'Mongo';
                }
                
                $server = 'mongodb://'.($this->_server ? $this->_server : 'localhost:27017');
		$this->_connection = new MongoClient($server,array('connect'=>true));
		if(is_resource($this->_connection)){
                    $this->_connected = true;
                }
	}
	
	public function isConnected() {
		return $this->_connected;
	}
	
	public function isPersistent() {
		return $this->_persistent;
	}
	
	public static function getInstance($server = '192.168.78.114', $port = '27017', $persistent = false) {
		static $instances;
		
		if (!$instances) {
			$instances = array();
		}
		
		if (is_bool($server)) {
			$persistent = $server;
			$server = $port = '';
		}
		
		if (is_bool($port)) {
			$persistent = $port;
			$port = '';
		}
		
		if (is_numeric($port) && $port) {
			$server .= ':' . $port;
		}
		
		$persistent = (bool)$persistent;
		$server = (string)$server;
		
		if (!$instances[$server]) {
			$instances[$server] = new Mongodloid_Connection($server, $persistent);
		}
		
		return $instances[$server];
	}
	
	private function __construct($server = '', $persistent = false) {
		$this->_persistent = (bool)$persistent;
		$this->_server = (string)$server;
	}
}