<?php

declare(strict_types=1);

function viewSignupErrors()
{
    if (isset($_SESSION["signup_errors"])) {

        echo '<ul class="error-list">';

        $errors = $_SESSION["signup_errors"];
        foreach ($errors as $error) {
            echo '<li><strong style="color: red;">' . htmlspecialchars($error) . '</strong></li>';
        }

        echo '</ul>';

        unset($_SESSION["signup_errors"]);
    } else if (isset($_GET['signup']) && $_GET['signup'] == "success") {
        viewWelcomeMsg();
    }
}

function viewWelcomeMsg()
{
    if (isset($_SESSION['userdata']) && $_SESSION['userdata'] != false) {
        $user = $_SESSION['userdata'];
        echo '<li><strong style="color: green;">' . "Welcome " . $user['name'] . '</strong></li>';
    }
}
// function test()
// {
//     if (!isset($_SESSION['userdata'])) {
//         echo "اتمسح";
//     } else {
//         $user = $_SESSION['userdata'];
//         echo '<li><strong style="color: green;">' . $user['name'] . '</strong></li>';
//     }
// }
