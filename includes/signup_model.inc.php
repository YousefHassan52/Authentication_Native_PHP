<?php

declare(strict_types=1);

function getUserByName(PDO $pdo, string $name)
{
    $query = "SELECT * from users WHERE name=:name";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getUserByEmail(PDO $pdo, string $email)
{
    $query = "SELECT * from users WHERE email=:email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
