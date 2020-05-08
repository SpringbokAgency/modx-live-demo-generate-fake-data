<?php

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tstart = $mtime;

$properties = [];
include dirname(dirname(__DIR__)) . '/properties.inc.php';
require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

$driver = $properties['xpdo_driver'];

$xpdo = new xPDO(
    $properties[$driver . '_string_dsn_test'],
    $properties[$driver . '_string_username'],
    $properties[$driver . '_string_password']
);

$packageBasePath = dirname(__DIR__) . '/';
$xpdo->setPackage('demo', $packageBasePath);
$xpdo->setLogTarget('ECHO');
$xpdo->setLogLevel(xPDO::LOG_LEVEL_INFO);

$xpdo->getManager()->getGenerator()->parseSchema(
    $packageBasePath . 'model/schema/demo.' . $driver . '.schema.xml',
    $packageBasePath . 'model/'
);

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$tend = $mtime;
$totalTime = ($tend - $tstart);
$totalTime = sprintf("%2.4f s", $totalTime);

echo "\nExecution time: {$totalTime}\n";

exit ();
