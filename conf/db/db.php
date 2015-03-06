<?php
defined('CONF') or die('no access');
$conf['db'] = array();
$conf['db']['type'] = 'mysql';
$conf['db']['conf'] = 'mysql.db.php';
$conf['db']['com'] = 'mysql.db.php';
include_once(CONF.'db/'.$conf['db']['conf']);
?>