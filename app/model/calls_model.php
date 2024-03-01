<?php
class calls_model
{
    private $db;
    public function __construct()
    {
        $this->db = conexion::con();
    }
    public function sp_add_call($a, $b = NULL, $c, $d)
    {
        $consulta = $this->db->prepare("CALL `sp_add_call`('$a','$b','$c','$d');");
        $result = $consulta->execute();
        return $result;
    }
    public function sp_view_week_current()
    {
        $consulta = $this->db->prepare("CALL sp_view_week_current();");
        $consulta->execute();
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function sp_view_today()
    {
        $consulta = $this->db->prepare("CALL sp_view_today();");
        $consulta->execute();
        $result = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_calc_today_satisfaccion()
    {
        $temp = [];
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            $consulta = $this->db->prepare("SELECT `fun_count_NxDay`('$i') as '$i';");
            $consulta->execute();
            array_push($temp, $consulta->fetch(PDO::FETCH_ASSOC)[$i]);
        }
        foreach ($temp as $key) {
            array_push($result, $key);
        }
        $Total = $result[0] + $result[1] + $result[2] + $result[3] + $result[4];
        $insa =  $result[0] + $result[1];
        $sat = $result[2] + $result[3] + $result[4];
        $porsent["ins"] = (($insa != 0) ? round(($insa / $Total), 2) * 100 : 0);
        $porsent["sat"] = (($sat != 0) ? round(($sat / $Total), 2) * 100 : 0);
        $porsent["data"]["insa"]["1"] =  $result[0];
        $porsent["data"]["insa"]["2"] =  $result[1];
        $porsent["data"]["sat"]["3"] = $result[2];
        $porsent["data"]["sat"]["4"] = $result[3];
        $porsent["data"]["sat"]["5"] = $result[4];

        return $porsent;
    }
    public function get_calc_week_satisfaccion()
    {
        $temp = [];
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            $consulta = $this->db->prepare("SELECT `fun_count_NxWeek_current`('$i') as '$i';");
            $consulta->execute();
            array_push($temp, $consulta->fetch(PDO::FETCH_ASSOC)[$i]);
        }
        foreach ($temp as $key) {
            array_push($result, $key);
        }
        $Total = $result[0] + $result[1] + $result[2] + $result[3] + $result[4];
        $insa =  $result[0] + $result[1];
        $sat = $result[2] + $result[3] + $result[4];
        $porsent["ins"] = (($insa != 0) ? ($insa / $Total) * 100 : 0);
        $porsent["sat"] = (($sat != 0) ? ($sat / $Total) * 100 : 0);
        $porsent["data"]["insa"]["1"] =  $result[0];
        $porsent["data"]["insa"]["2"] =  $result[1];
        $porsent["data"]["sat"]["3"] = $result[2];
        $porsent["data"]["sat"]["4"] = $result[3];
        $porsent["data"]["sat"]["5"] = $result[4];

        return $porsent;
    }
    public function get_calc_month_satisfaccion()
    {
        $temp = [];
        $result = [];
        for ($i = 1; $i <= 5; $i++) {
            $consulta = $this->db->prepare("SELECT `fun_count_NxMonth_current`('$i') as '$i';");
            $consulta->execute();
            array_push($temp, $consulta->fetch(PDO::FETCH_ASSOC)[$i]);
        }
        foreach ($temp as $key) {
            array_push($result, $key);
        }
        $Total = $result[0] + $result[1] + $result[2] + $result[3] + $result[4];
        $insa =  $result[0] + $result[1];
        $sat = $result[2] + $result[3] + $result[4];
        $porsent["ins"] = (($insa != 0) ? ($insa / $Total) * 100 : 0);
        $porsent["sat"] = (($sat != 0) ? ($sat / $Total) * 100 : 0);
        $porsent["data"]["insa"]["1"] =  $result[0];
        $porsent["data"]["insa"]["2"] =  $result[1];
        $porsent["data"]["sat"]["3"] = $result[2];
        $porsent["data"]["sat"]["4"] = $result[3];
        $porsent["data"]["sat"]["5"] = $result[4];

        return $porsent;
    }

    public function get_calc_today_liberacion()
    {
        $temp = [];
        $result = [];
        for ($i = 1; $i <= 3; $i++) {
            $consulta = $this->db->prepare("SELECT `fun_count_TCxDay`('$i') as '$i';");
            $consulta->execute();
            array_push($temp, $consulta->fetch(PDO::FETCH_ASSOC)[$i]);
        }
        foreach ($temp as $key) {
            array_push($result, $key);
        }
        $liberacion = $result[0];
        $transferencia =  $result[1];
        $corte = $result[2];
        $Total = $liberacion + $transferencia + $corte;
        $porsent["libs"] = (($liberacion != 0) ? ($liberacion / $Total) * 100 : 0);
        $porsent["corte"] = (($corte != 0) ? ($corte / $Total) * 100 : 0);
        $porsent["trans"] = (($transferencia != 0) ? ($transferencia / $Total) * 100 : 0);
        $porsent["data"]["liberacion"] =  $result[0];
        $porsent["data"]["transferencia"] =  $result[1];
        $porsent["data"]["corte"] = $result[2];

        return $porsent;
    }
    public function get_calc_week_liberacion()
    {
        $temp = [];
        $result = [];
        for ($i = 1; $i <= 3; $i++) {
            $consulta = $this->db->prepare("SELECT `fun_count_TCxWeek`('$i') as '$i';");
            $consulta->execute();
            array_push($temp, $consulta->fetch(PDO::FETCH_ASSOC)[$i]);
        }
        foreach ($temp as $key) {
            array_push($result, $key);
        }
        $liberacion = $result[0];
        $transferencia =  $result[1];
        $corte = $result[2];
        $Total = $liberacion + $corte;
        $porsent["libs"] = (($liberacion != 0) ? ($liberacion / $Total) * 100 : 0);
        $porsent["corte"] = (($corte != 0) ? ($corte / $Total) * 100 : 0);
        $porsent["trans"] = (($transferencia != 0) ? ($transferencia / $Total) * 100 : 0);
        $porsent["data"]["liberacion"] =  $result[0];
        $porsent["data"]["transferencia"] =  $result[1];
        $porsent["data"]["corte"] = $result[2];

        return $porsent;
    }
    public function get_calc_month_liberacion()
    {
        $temp = [];
        $result = [];
        for ($i = 1; $i <= 3; $i++) {
            $consulta = $this->db->prepare("SELECT `fun_count_TCxMonth`('$i') as '$i';");
            $consulta->execute();
            array_push($temp, $consulta->fetch(PDO::FETCH_ASSOC)[$i]);
        }
        foreach ($temp as $key) {
            array_push($result, $key);
        }
        $liberacion = $result[0];
        $transferencia =  $result[1];
        $corte = $result[2];
        $Total = $liberacion + $transferencia + $corte;
        $porsent["libs"] = (($liberacion != 0) ? ($liberacion / $Total) * 100 : 0);
        $porsent["corte"] = (($corte != 0) ? ($corte / $Total) * 100 : 0);
        $porsent["trans"] = (($transferencia != 0) ? ($transferencia / $Total) * 100 : 0);
        $porsent["data"]["liberacion"] =  $result[0];
        $porsent["data"]["transferencia"] =  $result[1];
        $porsent["data"]["corte"] = $result[2];

        return $porsent;
    }
}