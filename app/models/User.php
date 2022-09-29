<?php

    require_once("app/core/database.php");
class User{
    private $database;

    public $email;
    public $username;
    public $password;
    public $id;
    public function __construct($search=false, $u="", $p="")
    {
        $this->database = new Database();
    }

    public function hash_password($password){
        $this->password=md5($password);
    }

    public function create(){
        $cmd=$this->database->prepare("INSERT INTO User (email, username, password) VALUES
        (:email, :username, :password)");
        $cmd->execute(["email"=>$this->email, "username"=>$this->username, "password"=>$this->password]);
    }

    public function usernameExist($username){
        $cmd=$this->database->prepare("SELECT * FROM User WHERE username = :username");
        $cmd->execute(["username"=>$username]);
        return count($cmd->fetchAll())>0;
    }

    public function getUser($u, $p){
        $p=md5($p);
        $cmd = $this->database->prepare("SELECT id, username, email, password FROM User WHERE username=:username and password =:password limit 1");
        $cmd->execute(["username"=>$u, "password"=>$p]);
        return $cmd->fetch();
    }
}
?>