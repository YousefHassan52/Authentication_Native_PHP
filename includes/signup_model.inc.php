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
function createUser(PDO $pdo, string $name, string $email, string $password)
{
    $query = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12,
    ];
    $hashed_pwd = password_hash($password, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashed_pwd);
    $stmt->execute();
    // Get the last inserted ID
    $userId = $pdo->lastInsertId();

    // Fetch the user data
    $sql = "SELECT id, name, email FROM users WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $userId);
    $stmt->execute();

    // Return user data
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
