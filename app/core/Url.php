<?php
require_once "app/controllers/home.php";
class Url{
    public static $url=array(
        "test"=>["Home", "test"],
        "/"=>["Home", "index"],
        "auth/register"=>["auth", "signUp"],
        "auth/login"=>["auth", "login"]
    );
}
?>