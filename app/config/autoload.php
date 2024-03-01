<?php

// require_once  __DIR__."../../../config/config.class.php";
function controller_autoload($classname)
{
    $archive = __DIR__."/../controller/$classname.php";
    if (is_file($archive)) {
        require_once $archive;
    }
}
spl_autoload_register('controller_autoload');