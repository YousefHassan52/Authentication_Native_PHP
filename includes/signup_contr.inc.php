<?php

declare(strict_types=1);

function emptyFields(string $name, string $email, string $password): bool
{
    if (empty($name) || empty($email) || empty($password)) {
        return true;
    }
    return false;
}


function validEmail(string $email): bool
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function isNameAlreadyTaken(PDO $pdo, string $name)
{

    if (getUserByName($pdo, $name)) {
        return true;
    }
    return false;
}
function isEmailAlreadyTaken(PDO $pdo, string $email)
{

    if (getUserByEmail($pdo, $email)) {
        return true;
    }
    return false;
}
function userRegister(PDO $pdo, string $name, string $email, string $password)
{
    $user = createUser($pdo, $name, $email, $password);
    $_SESSION['userdata'] = $user;
}
function removePreviousInputDataFromSession()
{
    if (isset($_SESSION["signup_errors"])) {
        unset($_SESSION["signup_errors"]);
    }
}
