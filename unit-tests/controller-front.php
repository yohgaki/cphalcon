<?php

/*
  +------------------------------------------------------------------------+
  | Phalcon Framework                                                      |
  +------------------------------------------------------------------------+
  | Copyright (c) 2011-2012 Phalcon Team (http://www.phalconphp.com)       |
  +------------------------------------------------------------------------+
  | This source file is subject to the New BSD License that is bundled     |
  | with this package in the file docs/LICENSE.txt.                        |
  |                                                                        |
  | If you did not receive a copy of the license and are unable to         |
  | obtain it through the world-wide-web, please send an email             |
  | to license@phalconphp.com so we can send you a copy immediately.       |
  +------------------------------------------------------------------------+
  | Authors: Andres Gutierrez <andres@phalconphp.com>                      |
  |          Eduar Carvajal <eduar@phalconphp.com>                         |
  +------------------------------------------------------------------------+
*/

class ConfigTest extends PHPUnit_Framework_TestCase {


$config = new Phalcon_Config(array(
	'database' => array(
		'adapter' => 'Mysql',
		'host' => '192.168.0.28',
		'username' => 'support',
		'password' => 'H45pov682v',
		'name' => 'demo'
	),
	'phalcon' => array(
		'controllersDir' => 'tests/controllers/',
		'modelsDir' => 'tests/models/phalcon/',
		'viewsDir' => 'tests/views/',
		'basePath' => './'
	)
));


$front = Phalcon_Controller_Front::getInstance();

echo $front->getBaseUri();

$_GET['_url'] = 'test3/other';
$front->setConfig($config);
$view = $front->dispatchLoop();

if($view->getContent()=='lolhere'){
	echo 'Phalcon_Controller_Front::dispatchLoop() [1] [OK]', PHP_EOL;
} else {
	echo 'Phalcon_Controller_Front::dispatchLoop() [1] [FAILED]', PHP_EOL;
	return;
}