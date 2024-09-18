<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Sanitize and retrieve the input values

    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);



    // Debugging: Check if POST data is being passed correctly

    try {
        // Include necessary files
        require_once './session_config.inc.php';

        require_once './database.inc.php';
        require_once './login_model.inc.php';
        require_once './login_contr.inc.php';
        require_once './signup_contr.inc.php';

        // Error array to store validation messages
        $loginErrors = [];

        // Check for empty fields


        if (strlen(trim($email)) === 0) {
            $loginErrors["empty_fields"] .= " Please input your email.";
        }

        if (strlen($pwd) < 8) {
            $loginErrors["empty_fields"] .= " Please input min 9 chars pwd.";
        }


        // Debug: Ensure pwd is being checked correctly
        echo "pwd: " . $pwd; // For debugging, comment out later

        // Additional validation for email and unique fields
        if (!validEmail($email)) {
            $loginErrors["invalid_email"] = "Please provide a valid email.";
        }


        // If there are loginErrors, store them in the session and redirect back
        if ($loginErrors) {

            $_SESSION["login_errors"] = $loginErrors;
            header("Location: ../index.php");
        } else {
            // If no errors, register the user
            $loginResult = login($pdo, $email, $pwd);
            if ($loginResult) {
                header("Location: ../index.php?login=success");
            } else {
                header("Location: ../index.php?login=false");
            }
        }
    } catch (PDOException $e) {
        // Catch any database errors and display a message
        echo "Query failed: " . $e->getMessage();
    }
} else {
    // If not a POST request, redirect back to the index page
    header("location: ../index.php");
    die();
}
