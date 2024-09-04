<?php

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        require_once './database.inc.php';
        require_once './signup_model.inc.php';
        require_once './signup_contr.inc.php';
        // handle errors 
        $errors = [];
        if (emptyFields($name,  $email,  $password)) {
            $errors["empty_fields"] = "Please input all fields";
        }
        if (!validEmail($email)) {
            $errors["invalid_email"] = "please write valid email";
        }
        if (isNameAlreadyTaken($pdo, $name)) {
            $errors["taken_name"] = "this name is already taken";
        }
        if (isEmailAlreadyTaken($pdo, $email)) {
            $errors["taken_email"] = "this email is already taken";
        }

        require_once "./session_config.inc.php";
        if ($errors) {
            $_SESSION["signup_errors"] = $errors;
            header("Location: ../index.php");
        }
    } catch (PDOException $e) {
        echo "Query failed" . $e->getMessage();
    }
} else {

    header("location: ../index.php");
    die();
}
