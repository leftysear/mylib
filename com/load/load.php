<?php
defined('COM') or die('no access');

class load{
	private $css,$js;
	
	public function __construct($conf){
		include_once(COM.'load/css.load.php');
		include_once(COM.'load/css.js.php');
		$this->css = new load_css($conf['css']);
		$this->js = new load_js($conf['js']);
	}
}
?>