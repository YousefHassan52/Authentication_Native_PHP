<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Sanitize and retrieve the input values
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pwd = trim($_POST['pwd']);



    // Debugging: Check if POST data is being passed correctly

    try {
        // Include necessary files
        require_once './session_config.inc.php';

        require_once './database.inc.php';
        require_once './signup_model.inc.php';
        require_once './signup_contr.inc.php';

        // Error array to store validation messages
        $errors = [];

        // Check for empty fields

        if (strlen(trim($name)) === 0) {
            $errors["empty_fields"] = "Please input your name.";
        }
        if (strlen(trim($email)) === 0) {
            $errors["empty_fields"] .= " Please input your email.";
        }

        if (strlen($pwd) < 8) {
            $errors["empty_fields"] .= " Please input min 9 chars pwd.";
        }


        // Debug: Ensure pwd is being checked correctly
        echo "pwd: " . $pwd; // For debugging, comment out later

        // Additional validation for email and unique fields
        if (!validEmail($email)) {
            $errors["invalid_email"] = "Please provide a valid email.";
        }
        if (isNameAlreadyTaken($pdo, $name)) {
            $errors["taken_name"] = "This name is already taken.";
        }
        if (isEmailAlreadyTaken($pdo, $email)) {
            $errors["taken_email"] = "This email is already taken.";
        }

        // If there are errors, store them in the session and redirect back
        if ($errors) {
            $_SESSION['signup_data'] = [
                'name' => $name,
                'email' => $email,
            ];
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../index.php");
        } else {
            // If no errors, register the user
            userRegister($pdo, $name, $email, $pwd);
            removePreviousInputDataFromSession();
            header("Location: ../index.php?signup=success");
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
