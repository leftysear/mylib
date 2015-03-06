<?php
defined('CONF') or die('no access');
$conf['db'] = array();
$conf['db']['conf'] = 'mysqli.db.php';
$conf['db']['type'] = 'mysqli';
$conf['db']['com'] = 'mysqli.db.php';
$conf['db']['class'] = 'db_mysqli';
include_once(CONF.'db/'.$conf['db']['conf']);
?>