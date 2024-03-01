<?php
/**
 * MVC database version 4.4
 * desarrollado por ivan pulache 
 * contacto:
 *      ->  ivan_pulache_chiroque@live.com
 *      -> +51 910 115 652
 */
$start = microtime(true);

include_once "app/config/config.class.php";
$app = new base_config();
$app->loader_top();
$app->loader_function(["web-helper"]);
$app->run();
$end = microtime(true);
$time = $end - $start;
echo $app->env=== "dev" ? "<pre>execute time {$time}</pre>":null;
unset($app);
