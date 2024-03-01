<?php
class   home
{
    public function start()
    {
        session_start();
        call_vistas("alkar");
    }
    public function login()
    {
        call_vistas("login");
    }
}