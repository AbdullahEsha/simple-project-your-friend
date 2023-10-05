<?php if (isset($_GET['error'])) {
    if ($_GET['error'] == 'null_value') {
        echo "Username/Password field can't left empty...";
    }

    if ($_GET['error'] == 'invalid_user') {
        echo "Invalid username or Password";
    }

    if ($_GET['error'] == 'invalid_request') {
        echo "You have to login first...";
    }
} elseif (isset($_GET['success'])) {
    if ($_GET['success'] == 'registration_done') {
        echo "Registration Done! Now you can login...";
    }
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../style/main.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1>My Friend System <br />
            Log in Page</h1>
        <form action="../functions/logCheck.php" method="post">
            <div class="individual-input">
                <p>Email</p> <input type="email" name="friend_email" placeholder="Enter email address." />
            </div>
            <div class="individual-input">
                <p>Password</p> <input type="password" name="password" placeholder="Enter password." />
            </div>
            <div class="individual-button">
                <button type="submit" name="submit">Login</button>
                <button type="reset">Clear</button>
            </div>
        </form>
        <div class="navlinks">
            <a href="./index.php">Home</a>
        </div>
    </div>
</body>

</html>