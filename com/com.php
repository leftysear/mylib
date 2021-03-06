<?php
defined('COM') or die('no access');

class xcom{
	public $libs = array();
	
	public function __construct($conf){
		if($conf['use']['db']){
			include_once(COM.'db/db.php');
			$this->db = new db($conf['db']);
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