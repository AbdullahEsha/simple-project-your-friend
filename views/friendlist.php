<?php require_once('../functions/session_header.php');
require_once('../functions/allFunctions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend List</title>
    <link href="../style/main.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1>My Friend System <br />
            <?=$_SESSION['profile_name']?>'s
            Friend List Page <br />
            Total number of friends is
            <?=$_SESSION['num_of_friends']?>
        </h1>
        <table>
            <tbody>
                <?php $friends = getAllFriendsByID(); for ($i=0; $i != count($friends); $i++) {
                    if ($friends[$i]['profile_name'] != $_SESSION['profile_name']) {
                        ?>
                <form action="../functions/unfriend.php" method="post">
                    <tr>
                        <td>
                            <?=$friends[$i]['profile_name']?>
                        </td>
                        <td>
                            <input type="hidden" name="friend_id2"
                                value="<?=$friends[$i]['friend_id']?>">
                            <button type="submit" name="submit">Unfriend</button>
                        </td>
                    </tr>
                </form>
                <?php
                    }
                } ?>
            </tbody>
        </table>
        <div class="navlinks">
            <a href="./friendadd.php">Add Friends</a>
            <a href="../functions/logout.php">Log out</a>
        </div>
    </div>
</body>

</html>