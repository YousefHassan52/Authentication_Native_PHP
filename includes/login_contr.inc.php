<?php
function login(PDO $pdo, string $email, string $pwd)
{
    $user = getUserByEmailAndPassword($pdo, $email, $pwd);
    if ($user != false) {
        $_SESSION['userdata'] = $user;
    }
    return $user;
}
