<?php
define('PATH',str_replace('\\','/',dirname(__FILE__)).'/');

define('COM',PATH.'com/');
define('CONF',PATH.'conf/');

include_once(CONF.'conf.php');
include_once(COM.'com.php');

$com = new xcom($conf);
?>