<?php session_start();

if (!isset($_SESSION['friend_email'])) {
    header('location: ../views/login.php?error=invalid_request');
}
