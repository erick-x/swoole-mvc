<?php
class Mongodloid_Entity {
	private $_values;
	private $_collection;
	
	const POPFIRST = 1;
	
	private $_atomics = array(
		'inc',
//		'set',
		'push',
		'pushAll',
		'pop',
		'shift',
		'pull',
		'pullAll'
	);
	
	public function same(Mongodloid_Entity $obj) {
		return $this->getId() && ((string)$this->getId() == (string)$obj->getId());
	}
	
	public function equals(Mongodloid_Entity $obj) {
		$data1 = $this->getRawData();
		$data2 = $obj->getRawData();
		unset($data1['_id'], $data2['_id']);
		
		return $data1 == $data2;
	}
	
	public function inArray($key, $value) {
		if ($value instanceOf Mongodloid_Entity) {
			// TODO: Add DBRef checking
			return $this->inArray($key, $value->getId()) || $this->inArray($key, (string)$value->getId());
		}
		
		return in_array($value, $this->get($key));
	}

	public function __call($name, $params) {
		if (in_array($name, $this->_atomics)) {			
			$value = $this->get($params[0]);
			switch($name) {
				case 'inc':
					if ($params[1] === null)
						$params[1] = 1;
					$value += $params[1];
					break;
				case 'push':
					if (!is_array($value))
						$value = array();
					$value[] = $params[1];
					break;
				case 'pushAll':
					if (!is_array($value))
						$value = array();
					$value += $params[1];
					break;
				case 'shift':
					$name = 'pop';
					$params[1] = self::POPFIRST;
				case 'pop':
					$params[1] = ($params[1] == self::POPFIRST) ? -1 : 1;
					if ($params[1] == -1) {
						array_shift($value);
					} else {
						array_pop($value);
					}
					break;
				case 'pull':
					/*
					if (($key = array_search($params[1], $value)) !== FALSE) {
						unset($value[$key]);
					}
					*/
					$_value = array();
					foreach($value as $val) {
						if ($val !== $params[1]) {
							$_value[] = $val;
						}
					} // save array indexes - save the world!
					$value = $_value;
					break;
				case 'pullAll':
					$_value = array();
					foreach($value as $val) {
						if (!in_array($val, $params[1])) {
							$_value[] = $val;
						}
					}
					$value = $_value;
					break;
			}
			
			$value = $this->set($params[0], $value, true);
			
			if ($this->getId()) {
				$this->update(array(
					'$' . $name => array(
						$params[0] => $params[1]
					)
				));
			}
			
			return $this;
		}
		
		throw new Mongodloid_Exception(__CLASS__ . '::' . $name . ' does not exists and hasn\'t been trapped in __call()');
	}
	
	public function update($fields) {
		if (!$this->collection())
			throw new Mongodloid_Exception('You need to specify the collection');
		
		return $this->_collection->update(array(
			'_id' => $this->getId()->getMongoID()
		), $fields);
	}
	
	public function set($key, $value, $dontSend = false) {
		$key = preg_replace('@\\[([^\\]]+)\\]@', '.$1', $key);
		$real_key = $key;
		$result = &$this->_values;
		
		do {
			list($current, $key) = explode('.', $key, 2);
			$result = &$result[$current];
		} while ($key !== null);
		
		$result = $value;
		
		if (!$dontSend && $this->getId())
			$this->update(array('$set' => array($real_key => $value)));
		
		return $this;
	}
	
	public function get($key) {
		if (!$key)
			return $this->_values;
		if ($key == '_id')
			return $this->getId();
		
		$key = preg_replace('@\\[([^\\]]+)\\]@', '.$1', $key);
		$result = $this->_values;
		
		do {
			list($current, $key) = explode('.', $key, 2);
			$result = $result[$current];
		} while ($key !== null);
		
		return $result;
	}
	
	public function getId() {
		if (!$this->_values['_id'])
			return false;
			
		return new Mongodloid_ID($this->_values['_id']);
	}
	
	
	public function getRawData() {
		return $this->_values;
	}
	public function setRawData($data) {
		if (!is_array($data))
			throw new Mongodloid_Exception('Data must be an array!');
			
		// prevent from making a link
		$this->_values = unserialize(serialize($data));
	}
	public function save($collection = null) {
		if ($collection instanceOf Mongodloid_Collection)
			$this->collection($collection);
		
		if (!$this->collection())
			throw new Mongodloid_Exception('You need to specify the collection');
		
		return $this->collection()->save($this);
	}
	
	public function collection($collection = null) {
		if ($collection instanceOf Mongodloid_Collection)
			$this->_collection = $collection;
		
		return $this->_collection;
	}
	
	public function remove() {
		if (!$this->collection())
			throw new Mongodloid_Exception('You need to specify the collection');
			
		if (!$this->getId())
			throw new Mongodloid_Exception('Object wasn\'t saved!');
		
		return $this->collection()->remove($this);
	}
	
	public function __construct($values = null, $collection = null) {
		if ($values instanceOf Mongodloid_ID) {
			if (! $collection instanceOf Mongodloid_Collection)
				throw new Mongodloid_Exception('You need to specify the collection');
			
			$values = $collection->findOne($values, true);
		}
		
		if ($values instanceOf Mongodloid_Collection) {
			$collection = $values;
			$values = null;
		}
		
		if (!is_array($values))
			$values = array();
		
		$this->setRawData($values);
		$this->collection($collection);
	}
}