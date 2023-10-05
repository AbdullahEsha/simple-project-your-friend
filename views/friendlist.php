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
            <form>
                <tr>
                    <td>Dingo</td>
                    <td><button type="submit">Unfriend</button></td>
                </tr>
            </form>
        </table>
        <div class="navlinks">
            <a href="./friendadd.php">Add Friends</a>
            <a href="../functions/logout.php">Log out</a>
        </div>
    </div>
</body>

</html>