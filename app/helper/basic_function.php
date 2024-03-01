<?php
function call_vistas( $var = "", $datos = "")
{
    if (is_array($datos)) {
        $data = [];
        foreach ($datos as $dato => $key) {
            array_push($data, [$dato=>$key]);
        }
    }else {
        $data = $datos;
    }
    if (is_array($var)) {
        foreach ($var as $vistas) {
            if (is_file(__DIR__ . "/../view/sections/$vistas.php")) {
                require_once __DIR__ . "/../view/sections/$vistas.php";
            }
        }
    }else {
        if (is_file(__DIR__ . "/../view/sections/$var.php")) {
            require_once __DIR__ . "/../view/sections/$var.php";
        }
    }
}
function call_model($var = "")
{
    if (is_array($var )) {
        foreach ($var as $modelo) {
            if (is_file(__DIR__ . "/../model/$modelo.php")) {
                require_once(__DIR__ . "/../model/$modelo.php");
            }
        }
    }else {
        if (is_file(__DIR__ . "/../model/$var.php")) {
            require_once(__DIR__ . "/../model/$var.php");
        }
    }
}
/**
 * rouute links para enlaces etiquetas "a"
 *
 * @param [string] $link
 * @return void
 */
function route_link($link = "")
{
    return BASE_URL."$link";
}
function aws_link($name="",$ext = "jpg",$type="img"){
    return BASE_AWS."$type/$name.$ext" ;
}
function load_helper($name="")
{
    if (is_file(__DIR__ . "/../helper/".$name."-helper.php")) {
        require_once __DIR__ . "/../helper/".$name."-helper.php";
    }
}