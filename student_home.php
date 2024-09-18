<?php
require_once "./includes/signup_view.inc.php";
require_once "./includes/session_config.inc.php";

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
</head>

<body>
    <h1>Student home</h1>
    <?php viewWelcomeMsg(); ?>
    <form method="POST" action="includes/logout.inc.php">
        <button type="submit" name="submitButton">Logout</button>
    </form>
</body>

</html>