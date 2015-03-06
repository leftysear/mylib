<?php
defined('COM') or die('no access');

class db{
	private $lib;
	
	public function __construct($conf){
		include_once(COM.'db/'.$conf['com']);
		$this->lib = new $conf['class']($conf[$conf['type']]);
	}
}
?>