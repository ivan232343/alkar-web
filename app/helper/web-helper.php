<?php
/*
* Trunca un texto largo según el numero de palabras que se indique, y le agrega un texto adicional como los 3 puntos seguidos.
*
* @param string El texto que será truncad
* @param length Numero de palabras que traeremos
* @param ellipsis Texto adicional que se concatenará al cortarse la cadena
*
*/
function wordlimit($string, $length = 50, $ellipsis = "«…»")
{
    $words = explode(' ', $string);
    if (count($words) > $length) {
        return implode(' ', array_slice($words, 0, $length)) . "» «" . $ellipsis;
    } else {
        return $string;
    }
}
function set_tittle()
{
    $env = new base_config();
    // por mejorar
    // $resultado = "";
    // if ($title1 != "" && $title2 != "") {

    // } elseif ($title1 != "" && $title2 == "") {
    //     $resultado = ucfirst($title1);
    // } else {
    //     $resultado = ucfirst("inicio");
    // }

    // // ucfirst((isset($_GET["a"]) != "") ?  str_replace("_", " ", $_GET["a"]) . ((isset($_GET["b"]) && $_GET["b"] == "") ? (" ") : (str_replace("_", " ", " - " . ucfirst($_GET["b"]))))  : "inicio");
    return "<title> $env->project_name   </title>";
}
/**
 * llama a un script en html 
 * 
 * @param string $name  es el nombre del archivo js 
 * @param string $name es la vista  donde se va a llamar ejemplo extras/contacto
 * @param bool $externo comprueba si se llamara desde el lado del servidor o desde amazon web services 
 * 
 */
function call_sc($name, $geta, $externo = false)
{
    if ($geta == $name) {
        return " <script src='js/" . $name . ".min.js'></script>";
    }
}
function set_map($dad, $son  = "")
{
    if ($son = "" || $son = "start") {
        $set_map = "Inicio  <i class='mdi mdi-arrow-right' aria-hidden='true'></i> $dad ";
    } else {
        $set_map = "$dad  <i class='mdi mdi-arrow-right' aria-hidden='true'></i> $son ";
    }
    return $set_map;
}
function set_img($img_path, $img_extension = "webp",  $width = "",  $heigth = "")
{
    $env = new base_config();
    if ($env->env === "dev") {
        if ($img_extension === "") {$img_extension = "webp";}
        echo   "data-src=\"images/$img_path.$img_extension\" width=\"$width\" heigth=\"$heigth\"  class=\"lazyload\"";
    } else {
        echo    "data-src=\"" . BASE_AWS . "images/$img_path.$img_extension\" width=\"$width\" heigth=\"$heigth\" ";
    }
}
function set_stylesheet(array $name = [],$lib = false, $min = true)
{
    if ($min) {
        foreach ($name as $style) {
            if (!$lib) {
                echo "<link rel=\"stylesheet\" href=\"css/$style.min.css\">";
            }else{
                echo "<link rel=\"stylesheet\" href=\"lib/$style.min.css\">";
            }
        }
    }
}
