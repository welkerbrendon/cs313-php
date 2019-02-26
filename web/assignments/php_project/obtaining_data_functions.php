<?php
    require('connect_to_db.php');
    
    function get_user_id($username, $password, $db){
        $uuid_query = $db->prepare("SELECT id 
                                    FROM user_info 
                                    WHERE username=:username 
                                    AND account_password=:password");
        $uuid_query->bindValue(":username", $username, PDO::PARAM_STR);
        $uuid_query->bindValue(":password", $password, PDO::PARAM_STR);
        $uuid_query->execute();
        $user_id_array = $uuid_query->fetch(PDO::FETCH_ASSOC);
        return $user_id_array["id"];
    }

    function get_most_recent_day($username, $password){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);
        $most_recent_day_id = NULL;
        $find_day = $db->prepare("SELECT id 
                                      FROM day 
                                      WHERE given_day=:comparable_date
                                      AND day.user_id=:user_id");
        $find_day->bindParam(":comparable_date", $comparable_date, PDO::PARAM_STR);
        $find_day->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $i = 0;
        while($most_recent_day_id == NULL && i < 100){
            $comparable_date = date('Y-m-d', strtotime("-$i days"));
            $find_day->execute();

            $most_recent_day_id = $find_day->fetch(PDO::FETCH_ASSOC);
            $most_recent_day_id = $most_recent_day_id["id"];
            
            $i++;
        }
        $query = $db->prepare("SELECT activity.start_time, activity.end_time, activity.productive, activity_type.type_name, activity.notes, day.given_day 
                               FROM activity
                               INNER JOIN day
                               ON activity.user_id=:user_id 
                               AND day.id=:most_recent_day_id
                               AND day.id=activity.day_id
                               INNER JOIN activity_type
                               ON activity_type.id=activity.activity_type_id
                               ORDER BY start_time ASC");
        $query->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $query->bindValue(":most_recent_day_id", $most_recent_day_id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_given_day($username, $password, $day){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);

        $query = $db->prepare("SELECT activity.start_time, activity.end_time, activity.productive, activity_type.type_name, activity.notes, day.given_day
                              FROM activity
                              INNER JOIN day
                              ON activity.user_id=:user_id
                              AND day.given_day=:day
                              AND activity.user_id=day.user_id
                              INNER JOIN activity_type
                              ON activity_type.id=activity.activity_type_id
                              ORDER BY start_time ASC");
        $query->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $query->bindValue(":day", "$day", PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_days_in_window($username, $password, $start_day, $end_day){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);

        $query = $db->prepare("SELECT activity.start_time, activity.end_time, activity.productive, activity_type.type_name, activity.notes, day.given_day
                               FROM activity
                               INNER JOIN day
                               ON activity.user_id=:user_id
                               AND day.given_day <= :end_day
                               AND day.given_day >= :start_day
                               AND day.id=activity.day_id
                               INNER JOIN activity_type
                               ON activity_type.id=activity.activity_type_id
                               ORDER BY given_day, start_time ASC");
        $query->bindValue(":user_id", $user_id, PDO::PARAM_STR);
        $query->bindValue(":end_day", $end_day, PDO::PARAM_STR);
        $query->bindValue(":start_day", $start_day, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>