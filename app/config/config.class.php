<?php
class base_config
{
    /**  variables privadas **/

    /** variables publicas **/
    /* ---base de datos--- */
    public $_motor = "mysql";
    public $_host = "localhost";
    public $_namedb;
    public $_user = "root";
    public $_upass = "300499";
    /* --------------------  */

    /* ---entorno--- */
    public $project_name = "alkar-web";
    //envs disponibles -> "dev","pro","test"
    public $env = "dev";
    public $load_config  = ["parametros_base", "autoload", "database"];
    public $load_head = ["metadata", "header"];
    public $load_footer = ["footer"];
    public $load_function = ["basic_function", "web-helper"];
    public $master_app_dir = __DIR__ . "/../";
    public $master_public_dir = __DIR__ . "/../../src/";
    /* ---------------  */

    /* ---herramientas--- */

    public function loader_top()
    {
        foreach ($this->load_config as $primary) {
            if (is_file($this->master_app_dir . "config/$primary.php")) {
                include_once $this->master_app_dir . "config/$primary.php";
            }
        }
    }
    public function loader_layouts(array $layout = [])
    {
        if (count($layout) == 0) {
            $layout = $this->load_head;
        }
        foreach ($layout as $primary) {
            if (is_file($this->master_app_dir . "view/layout/$primary.php")) {
                include_once $this->master_app_dir . "view/layout/$primary.php";
            }
        }
    }
    public function loader_function()
    {
        foreach ($this->load_function as $primary) {
            if (is_file($this->master_app_dir . "helper/$primary.php")) {
                include_once $this->master_app_dir . "helper/$primary.php";
            }
        }
    }
    /* ------------------- */
    /* ---indexacion--- */
    public function load_index($controlador, $accion)
    {
        $errores = new notfound();
        $controlador != "" ? $controlador : $controlador = CONTROLLER_DEFAULT;
        $accion != "" ?  $accion : $accion = ACTION_DEFAULT;

        //pasamos a una comprobacion de "/"
        $uri = explode("/", $controlador);
        if (is_array($uri) && count($uri) >= 2) {
            $controlador = $uri[0];
            if ($uri[1] != "") {
                $params = array($accion);
                $accion = $uri[1];
                $slashs = count($uri) - 2;
                if ($slashs >= 1) {
                    $_GET = array();
                    for ($i = 2; $i <= $slashs + 1; $i++) {
                        array_push($_GET, $uri[$i]);
                        array_push($params, $uri[$i]);
                    }
                }
            } else {
                $uri[0] = ACTION_DEFAULT;
            }
        }
        if (class_exists($controlador)) {
            $controlador  = new $controlador();
            if (method_exists($controlador, $accion)) {
                if (isset($params) && count($params) != 0) {
                    $controlador->$accion($params);
                } else {
                    $controlador->$accion();
                }
            } else {
                $errores->notFind($accion);
            }
        } else {
            $errores->notFind($controlador);
        }
    }
    /* ------------------- */
    /* ---app--- */
    public function run()
    {
        isset($_GET["con"]) ? $controlador = $_GET["con"] : $controlador = "";
        isset($_GET["act"]) ? $action = $_GET["act"] : $action = "";
        // puedes modificar el header a tu gusto si quieres pones diferentes headers
        $this->loader_layouts();
        // --------------------
        $this->load_index($controlador, $action);
        // --------------------
        // al igual que el footer 
        $this->loader_layouts(["footer"]);
    }
    /* --------- */
}