<?php
    function set_failed_cookie($value){
        setcookie("failed", $value, time() + 2);
    }

    $username = $_POST["new_username"];
    $password = $_POST["new_password"];
    $verify_password = $_POST["verify_password"];

    echo "$username<br>";
    echo "$password<br>";
    echo "$verify_password<br>";

    if($username && $password && $verify_password){
        echo "True";
    }
    else {
        echo "False";
    }
    
    /*if($username && $password && $verify_password){
        if($_POST["password"] == $_POST["verify_password"]){
            require_once("connect_to_db.php");

            $db = connect();

            $check_statement = $db->prepare("SELECT user_id 
                                             FROM user_info 
                                             WHERE username=:username 
                                             AND account_password=:password");
            $check_statement->bindValue(":username", $username, PDO::PARAM_STR);
            $check_statement->bindValue(":password", $password, PDO::PARAM_STR);

            $check_statement->execute();
            if($check_statement->fetch(PDO::FETCH_STR)){
                set_failed_cookie("exists");
                header("Location: create_acount.php");
                exit;
            }
            else {
                $post_statement = $db->prepare("INSERT INTO user_info (user_id, username, account_password, created_at, last_active_at)
                                                VALUES (:new_id, :username, :password, now(), now()");
                $post_statement->bindValue(":username", $username, PDO::PARAM_STR);
                $post_statement->bindValue(":new_id", uuid_generate_v4(), PDO::PARAM_STR);
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
    }*/
?>