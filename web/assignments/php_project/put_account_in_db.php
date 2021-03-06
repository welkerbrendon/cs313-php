<?php
    function set_failed_cookie($value){
        setcookie("failed", $value, time() + 2);
    }

    $username = $_POST["new_username"];
    $password = $_POST["new_password"];
    $verify_password = $_POST["verify_password"];
    
    if($username && $password && $verify_password){
        if($password == $verify_password){
            require_once("connect_to_db.php");

            $db = connect();

            $check_statement = $db->prepare("SELECT id 
                                             FROM user_info 
                                             WHERE username=:username 
                                             AND account_password=:password");
            $check_statement->bindValue(":username", $username, PDO::PARAM_STR);
            $check_statement->bindValue(":password", $password, PDO::PARAM_STR);

            $check_statement->execute();
            if($check_statement->fetch(PDO::FETCH_ASSOC)){
                set_failed_cookie("exists");
                header("Location: create_account.php");
                exit;
            }
            else {
                $post_statement = $db->prepare("INSERT INTO user_info (id, username, account_password, created_at, last_active_time)
                                                VALUES (uuid_generate_v4(), :username, :password, now(), now())");
                $post_statement->bindValue(":username", $username, PDO::PARAM_STR);
                $post_statement->bindValue(":password", $password, PDO::PARAM_STR);

                $post_statement->execute();

                header("Location: sign_in.php");
                exit;
            }
        }
        else {
            set_failed_cookie("unable_to_verify");
            header("Location: create_account.php");
            exit;
        }
    }
    else {
        set_failed_cookie("no_data");
        header("Location: create_account.php");
        exit;
    }
?>