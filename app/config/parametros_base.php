<?php
define('SECURE', $_SERVER["REQUEST_SCHEME"] . "://"); //para automatizar el http:// o https://
require_once "config.class.php";
$env_config = new base_config();
if ($env_config->env === "dev") {
    $carpeta=explode("/",$_SERVER["REQUEST_URI"]);
    define("BASE_URL", SECURE . $_SERVER["SERVER_NAME"]."/".$env_config->project_name."/"); //para automatizar {url.com}/... si quieres borra el request uri
}else{
    define("BASE_URL", SECURE . $_SERVER["SERVER_NAME"]."/"); //para automatizar {url.com}/... si quieres borra el request uri
}
define("CONTROLLER_DEFAULT", "home"); //controlador predefinido
define("ACTION_DEFAULT", "start"); // funcion del controlador predefinido
define('DATA_LOCAL',BASE_URL."src/");
define("BASE_AWS","https://$env_config->project_name.s3.us-east-2.amazonaws.com/");