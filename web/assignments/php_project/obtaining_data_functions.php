<?php
    require('connect_to_db.php');
    
    function get_user_id($username, $password, $db){
        $uuid_query = $db->prepare("SELECT user_id 
                                    FROM user_info 
                                    WHERE username='$username' 
                                    AND account_password='$password'");
        $uuid_query->execute();
        $user_id_array = $uuid_query->fetch(PDO::FETCH_ASSOC);
        return $user_id_array["user_id"];
    }

    function get_most_recent_day($username, $password){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);
        $most_recent_given_day = NULL;
        $i = -1;
        while($most_recent_given_day == NULL){
            $i++;
            $comparable_date = date('Y-m-d', strtotime("-$i days"));
            $find_day = $db->prepare("SELECT given_day 
                                      FROM activity 
                                      WHERE given_day='$comparable_date'");
            $find_day->execute();
            $most_recent_given_day = $find_day->fetch(PDO::FETCH_ASSOC);
            $most_recent_given_day = $most_recent_given_day["given_day"];
        }
        $query = $db->prepare("SELECT start_time, end_time, productive, activity_type, notes 
                               FROM activity 
                               WHERE user_id=Cast('$user_id' as UUID) 
                               AND given_day=Cast('$most_recent_given_day' as Date)
                               ORDER BY start_time ASC");

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_given_day($username, $password, $day){
        $db = connect();
        $user_id = get_user_id($username, $password, $db);

        $query = $db->prepare("SELECT start_time, end_time, productive, activity_type, notes
                              From activity
                              WHERE user_id=Cast('$user_id' as UUID)
                              AND given_day=Cast('$day' as Date)
                              ORDER BY start_time ASC");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    function get_days_in_window($username, $password, $start_day, $end_day){
        
    }
?>