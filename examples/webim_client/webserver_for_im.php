<?php
define('DEBUG', 'on');
require __DIR__ . '/../../libs/lib_config.php';

$AppSvr = new Swoole\Network\Protocol\HttpServer();
$AppSvr->loadSetting(__DIR__.'/../swoole.ini'); //加载配置文件
$AppSvr->setDocumentRoot(__DIR__);
$AppSvr->setLogger(new \Swoole\Log\EchoLog(true)); //Logger

$server = new \Swoole\Network\SelectTCP('0.0.0.0', 8888);
$server->setProtocol($AppSvr);
$server->run(array('worker_num' => 1));
