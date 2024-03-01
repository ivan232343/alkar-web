<?php
include_once __DIR__ . "/main.php";

try {
    // var_dump($_POST);
    $data = "";
    if (isset($_POST["f"])) {
        $data = $record->sp_view_today();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        unset($data);
    } elseif (isset($_POST["satisfaccion"],$_POST["type"])) {
        if ($_POST["satisfaccion"]  == "true" ) {
            if ($_POST["type"] == "hoy" ) {
                $data  = $record->get_calc_today_satisfaccion();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }elseif ($_POST["type"] == "semana" ) {
                $data  = $record->get_calc_week_satisfaccion();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }elseif ($_POST["type"] == "mes" ) {
                $data  = $record->get_calc_month_satisfaccion();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
        }
    } elseif (isset($_POST["liberacion"],$_POST["type"])) {
        if ($_POST["liberacion"]  == "true" ) {
            if ($_POST["type"] == "hoy" ) {
                $data  = $record->get_calc_today_liberacion();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }elseif ($_POST["type"] == "semana" ) {
                $data  = $record->get_calc_week_liberacion();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }elseif ($_POST["type"] == "mes" ) {
                $data  = $record->get_calc_month_liberacion();
                echo json_encode($data, JSON_UNESCAPED_UNICODE);
            }
        }
    } 
} catch (Throwable $th) {
    return "error  :( -> $th";
}
