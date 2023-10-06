<?php session_start();
require_once('./allFunctions.php');

if (isset($_POST['submit'])) {
    $friend_id1 = $_SESSION['friend_id']  ;
    $friend_id2 = $_POST['friend_id2'];

    if (empty($friend_id1) || empty($friend_id2)) {
        header('location: ../views/friendlist.php?error=null_value1');
    } else {
        $friendID = [
            'friend_id1'=> $friend_id1,
            'friend_id2'=> $friend_id2,
        ];

        $status = deleteFriend($friendID);

        if ($status) {
            header('location: ../views/friendadd.php?success=friend_unfriended');
        } else {
            header('location: ../views/friendlist.php?error=db_error');
        }
    }
}
