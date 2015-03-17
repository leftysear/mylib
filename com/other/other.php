<?php
defined('COM') or die('no access');

class other{
	private $libs = array();
	
	public function __construct($conf){
		foreach($conf['use'] as $use){
			include_once(COM.'other/'.$use.'.other.php');
			$this->libs[$use] = new $conf[$use]['class_name']($conf[$use]);
		}
	}
	
	public function __get($key){
		return $this->libs[$key];
	}
	
	public function __set($key,$val){
		$this->libs[$key] = $val;
	}
}
?>