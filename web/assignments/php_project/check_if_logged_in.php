<?php
    function check_if_logged_in(){
        if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
            setcookie("username", $_COOKIE["username"], time() + (60 * 30));
            setcookie("password", $_COOKIE["password"], time() + (60 * 30));
        }
        else {
            header("Location: sign_in.php");
            exit;
        }
        if($_COOKIE["valid_user"] == "True"){
            setcookie("valid_user", "True", time() + (60 * 30));
        }
        else {
            header("Location: sign_in.php");
            exit;
        }
    }
?>