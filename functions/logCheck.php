<?php
    require_once('./session_header.php');
    require_once('../functions/allFunctions.php');

    if (isset($_POST['submit'])) {
        $friend_email = $_POST['friend_email'];
        $password     = $_POST['password'];

        if (empty($friend_email) || empty($password)) {
            header('location: ../views/login.php?error=null_value');
        } else {
            $user = [
                'friend_email'=>$friend_email,
                'password'=>$password,
            ];
            
            $status = validate($user);

            $friend_id       = $status['friend_id'] ;
            $friend_email    = $status['friend_email'] ;
            $profile_name    = $status['profile_name'] ;
            $date_started    = $status['date_started'] ;
            $num_of_friends  = $status['num_of_friends'] ;


            if ($status) {
                $_SESSION['friend_id'] = $friend_id;
                $_SESSION['friend_email'] = $friend_email;
                $_SESSION['profile_name'] = $profile_name;
                $_SESSION['date_started'] = $date_started;
                $_SESSION['num_of_friends'] = $num_of_friends;

                header('location: ../views/friendlist.php');
            } else {
                header('location: ../views/login.php?error=invalid_user');
            }
        }
    }
