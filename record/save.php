<?php
include_once __DIR__ . "/main.php";
$tipo_corte = $_POST["tipo_corte"];
$insa = $_POST["insa"];
$time_in = $_POST["time_in"];
$time_out = $_POST["time_out"];
try {
    $record->sp_add_call($tipo_corte, $insa, $time_in, $time_out);
    $estado = array('status' => "ok", 'msg' => "Guardado correctamente");
    echo json_encode($estado);
} catch (\Throwable $th) {
    $estado = array('status' => "fail", 'msg' => "Error al guardar", 'error' => $th);
    echo json_encode($estado);
}