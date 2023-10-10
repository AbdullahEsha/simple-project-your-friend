<?php require_once('../db/db.php');
function getAllFriends()
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "select * from friends where friend_id not in (select friend_id2 from myfriends)";
    $result = mysqli_query($conn, $sql);
    $friends = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($friends, $row);
    }

    return $friends;
}

function validate($user)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "select * from friends where friend_email='{$user['friend_email']}' and password='{$user['password']}'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if (count($user) > 0) {
        return $user;
    } else {
        return $user;
    }
}

function insert($user)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "insert into friends values('', '{$user['friend_email']}','{$user['password']}', '{$user['profile_name']}', CURRENT_TIMESTAMP, 0)";
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function addFriend($friendID)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "insert into myfriends values('{$friendID['friend_id1']}','{$friendID['friend_id2']}')";

    getNumOfFriends($friendID['friend_id1']);
    
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getNumOfFriends($friendID)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "select count(*) as num_of_friends from myfriends where friend_id1='{$friendID}'";
    $result = mysqli_query($conn, $sql);
    $num_of_friends = mysqli_fetch_assoc($result);
    $count = $num_of_friends['num_of_friends'] + 1;
    
    $_SESSION['num_of_friends'] = $count;

    $sql = "update friends set num_of_friends='{$count}' where friend_id='{$friendID}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getAllFriendsByID()
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "select * from friends, myfriends where friends.friend_id = myfriends.friend_id2";
    $result = mysqli_query($conn, $sql);
    $friends = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($friends, $row);
    }

    return $friends;
}

function deleteFriend($friendID)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "delete from myfriends where friend_id1='{$friendID['friend_id1']}' and friend_id2='{$friendID['friend_id2']}'";

    getNumOfFriendsDelete($friendID['friend_id1']);

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getNumOfFriendsDelete($friendID)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "select count(*) as num_of_friends from myfriends where friend_id1='{$friendID}'";
    $result = mysqli_query($conn, $sql);
    $num_of_friends = mysqli_fetch_assoc($result);
    $count = $num_of_friends['num_of_friends'] - 1;
    
    $_SESSION['num_of_friends'] = $count;

    $sql = "update friends set num_of_friends='{$count}' where friend_id='{$friendID}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}
