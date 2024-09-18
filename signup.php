<?php
require_once "./includes/session_config.inc.php";
require_once "./includes/signup_view.inc.php";
require_once "./includes/login_view.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php viewWelcomeMsg(); ?>

    <div class="big_div">


        <div class="form-container">
            <h2>Registration Form</h2>
            <form action="includes/signup.inc.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo isset($_SESSION['signup_data']['name']) ? htmlspecialchars($_SESSION['signup_data']['name'], ENT_QUOTES) : ''; ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_SESSION['signup_data']['email']) ? htmlspecialchars($_SESSION['signup_data']['email'], ENT_QUOTES) : ''; ?>">

                <label for="pwd">Password:</label>
                <input type="password" id="pwd" name="pwd">

                <input type="submit" value="Register">
                <div style="display: flex; align-items: center;">
                    <p style="margin-right: 10px;">Already have an account?</p>
                    <button onclick="window.location.href = 'login.php';">Login</button>
                </div>
            </form>
            <?php viewSignupErrors(); ?>
        </div>


    </div>
</body>


</html>