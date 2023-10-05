<?php if (isset($_GET['error'])) {
    if ($_GET['error'] == 'db_error') {
        echo "Something went wrong...please try again";
    }
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../style/main.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <h1>My Friend System <br />
            Registration Page</h1>
        <form action="../functions/signUpCheck.php" method="post">
            <div class="individual-input">
                <p>Email</p> <input type="email" name="friend_email" placeholder="Enter email address." />
            </div>
            <div class="individual-input">
                <p>Profile Name</p> <input type="text" name="profile_name" placeholder="Enter profile name." />
            </div>
            <div class="individual-input">
                <p>Password</p> <input type="password" name="password" placeholder="Enter password." />
            </div>
            <div class="individual-input">
                <p>Confirm Password</p> <input type="password" name="confirmPassword"
                    placeholder="Enter password again." />
            </div>
            <div class="individual-button">
                <button type="submit" name="submit">Register</button>
                <button type="reset">Clear</button>
            </div>
        </form>
        <div class="navlinks">
            <a href="./index.php">Home</a>
        </div>
    </div>
</body>

</html>