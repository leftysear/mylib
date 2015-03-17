<?php
defined('CONF') or die('no access');

$conf['other'] = array();
$conf['other']['use'] = array('sfz');

foreach($conf['other']['use'] as $use){
	include_once(CONF.'other/'.$use.'.other.php');
}
?>