<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
 	(
 		'type'       => 'MySQLi',
 		'connection' => array(
 			'hostname'   => 'localhost',
 			'database'   => 'kohana',
 			'username'   => 'root',
 			'password'   => 'toor',
 			'persistent' => FALSE,
 			'ssl'        => NULL,
 		),
 		'table_prefix' => '',
 		'charset'      => 'utf8',
 		'caching'      => FALSE,
 	),
);
