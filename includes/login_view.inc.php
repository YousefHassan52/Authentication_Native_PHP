<?php
function welcomeLogin()
{

    if (isset($_SESSION['userdata']) && $_SESSION['userdata'] != false) {
        echo "hi" . $_SESSION['userdata']['name'];
    }
}
function viewLoginErrors()
{
    if (isset($_SESSION["login_errors"])) {

        echo '<ul class="error-list">';

        $errors = $_SESSION["login_errors"];
        foreach ($errors as $error) {
            echo '<li><strong style="color: red;">' . htmlspecialchars($error) . '</strong></li>';
        }

        echo '</ul>';

        unset($_SESSION["login_errors"]);
    } else {
        welcomeLogin();
    }
}
