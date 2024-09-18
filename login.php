<?php
require_once "./includes/session_config.inc.php";
require_once "./includes/login_view.inc.php";
require_once "./includes/signup_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php viewWelcomeMsg(); ?>

    <div class="big_div">
        <?php if (isset($_SESSION['userdata'])): ?>
            <form method="POST" action="includes/logout.inc.php">
                <button type="submit" name="submitButton">Logout</button>
            </form>
        <?php endif; ?>



        <div class="form-container">
            <h2>Login Form</h2>
            <form action="includes/login.inc.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">

                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd">

                <input type="submit" value="Login">




            </form>
            <div style="display: flex; align-items: center;">
                <p style="margin-right: 10px;">Don't have an account?</p>
                <button onclick="window.location.href = 'signup.php';">Signup</button>
            </div>

            <?php viewLoginErrors(); ?>
        </div>
    </div>
</body>


</html>