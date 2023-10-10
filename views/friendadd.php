<?php require_once('../functions/session_header.php');
require_once('../functions/allFunctions.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friend Add</title>
    <link href="../style/main.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1>My Friend System <br />
            <?=$_SESSION['profile_name']?>'s Add
            Friend Page <br />
            Total number of friends is
            <?=$_SESSION['num_of_friends']?>
        </h1>
        <table>
            <tbody>
                <?php $friends = getAllFriends(); for ($i=0; $i != count($friends); $i++) {
                    if ($friends[$i]['profile_name'] != $_SESSION['profile_name']) {
                        ?>
                <form action="../functions/addfriend.php" method="post">
                    <tr>
                        <td>
                            <?=$friends[$i]['profile_name']?>
                        </td>
                        <td>
                            <input type="hidden" name="friend_id2"
                                value="<?=$friends[$i]['friend_id']?>">
                            <button type="submit" name="submit">Add as friend</button>
                        </td>
                    </tr>
                </form>
                <?php
                    }
                    if (count($friends)===0) {
                        ?>
                <p style="text-align: center; margin-top: 20px;"> Add Friends. </p>
                <?php
                    }
                } ?>
            </tbody>
        </table>
        <div class="navlinks">
            <a href="./friendlist.php">Friend Lists</a>
            <a href="../functions/logout.php">Log out</a>
        </div>
    </div>
</body>

</html>