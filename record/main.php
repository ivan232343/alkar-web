<?php
require_once __DIR__. '/../app/config/database.php';
$base = new base_config();
$base->loader_function();
call_model("calls_model");
$record = new calls_model();