<?php session_start();
require_once('./allFunctions.php');

if (isset($_POST['submit'])) {
    $friend_email 	 = $_POST['friend_email'];
    $profile_name    = $_POST['profile_name'];
    $password        = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($friend_email) || empty($profile_name) || empty($password) || empty($confirmPassword)) {
        header('location: ../views/signup.php?error=null_value1');
    } elseif ($password != $confirmPassword) {
        header('location: ../views/signup.php?error=password_missmatch');
    } else {
        $user = [
            'profile_name'=> $profile_name,
            'friend_email'=> $friend_email,
            'password'=> $password,
        ];

        $status = insert($user);

        if ($status) {
            header('location: ../views/login.php?success=registration_done');
        } else {
            header('location: ../views/signup.php?error=db_error');
        }
    }
}
