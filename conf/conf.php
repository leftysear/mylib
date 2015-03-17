<?php
defined('CONF') or die('no access');
$conf = array();
$conf['use'] = array();
$conf['use']['db'] = true;
if($conf['use']['db']){
	include_once(CONF.'db/db.php');
}

include_once(CONF.'other/other.php');
?>