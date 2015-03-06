<?php
defined('CONF') or die('no access');
$conf['db'] = array();
$conf['db']['conf'] = 'mysql.db.php';
$conf['db']['type'] = 'mysql';
$conf['db']['com'] = 'mysql.db.php';
$conf['db']['class'] = 'db_mysql';
include_once(CONF.'db/'.$conf['db']['conf']);
?>