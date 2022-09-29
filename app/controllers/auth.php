<?php
class Auth extends Controller{
    public function login(){
        if(isset($_POST["username"])){
            $user=$this->model("User");
            $valid=$user->getUser($_POST["username"], $_POST["password"]);
            if($valid!=null){
                header("location:../");
            }
            $this->view("auth/login.php", ["message"=>"Nom d'utilisateur introuvable ou mot de passe incorect"]);
        }
        $this->view("auth/login.php");
    }

    public function signUp(){
        if(isset($_POST["username"])){
            $user = $this->model("User");
            $user->username=$_POST["username"];
            if($user->usernameExist)
            $user->email=$_POST["email"];
            $user->hash_password($_POST["password"]);

            $user->create();
            header("location:../");
        }
        $this->view("auth/register.php");
    }
}
?>