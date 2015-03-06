<?php
defined('COM') or die('no access');

class xcom{
	public $db;
	
	public function __construct($conf){
		if($conf['use']['db']){
			include_once(COM.'db/db.php');
			$this->db = new db($conf['db']);
		}
	}
}
?>