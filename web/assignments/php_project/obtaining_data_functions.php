<?php
    require('connect_to_db.php');
    
    function get_user_id($username, $password, $db){
        $uuid_query = $db->prepare("SELECT user_id 
                                    FROM user_info 
                                    WHERE username=:username 
                                    AND account_password=:password");
        $uuid_query->bindValue(":username", $username, PDO::PARAM_STR);
        $uuid_query->bindValue(":password", $password, PDO::PARAM_STR);
        $uuid_query->execute();
        $user_id_array = $uuid_query->fetch(PDO::FETCH_ASSOC);
        return $user_id_array["user_id"];
    }

    function get_most_recent_day($username, $password){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);
        $most_recent_day_id = NULL;
        $i = -1;
        while($most_recent_day_id == NULL){
            $i++;
            $comparable_date = date('Y-m-d', strtotime("-$i days"));
            $find_day = $db->prepare("SELECT id 
                                      FROM day 
                                      WHERE given_day='$comparable_date'");
            $find_day->execute();
            $most_recent_day_id = $find_day->fetch(PDO::FETCH_ASSOC);
            $most_recent_day_id = $most_recent_day_id["id"];
        }
        $query = $db->prepare("SELECT activity.start_time, activity.end_time, activity.productive, activity.activity_type, activity.notes, day.given_day 
                               FROM activity
                               INNER JOIN day
                               ON activity.user_id=Cast('$user_id' as UUID) 
                               AND day.id=$most_recent_day_id
                               AND day.id=activity.day_id
                               ORDER BY start_time ASC");

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_given_day($username, $password, $day){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);

        $query = $db->prepare("SELECT activity.start_time, activity.end_time, activity.productive, activity.activity_type, activity.notes, day.given_day
                              FROM activity
                              INNER JOIN day
                              ON activity.user_id=Cast('$user_id' as UUID)
                              AND day.given_day=Cast('$day' as Date)
                              AND day.id=activity.day_id
                              ORDER BY start_time ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_days_in_window($username, $password, $start_day, $end_day){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);

        $query = $db->prepare("SELECT activity.start_time, activity.end_time, activity.productive, activity.activity_type, activity.notes, day.given_day
                               FROM activity
                               INNER JOIN day
                               ON activity.user_id=Cast('$user_id' as UUID)
                               AND day.given_day <= Cast('$end_day' as Date)
                               AND day.given_day >= Cast('$start_day' as Date)
                               AND day.id=activity.day_id
                               ORDER BY given_day, start_time ASC");
        
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
?>