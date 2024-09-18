<?php
function getUserByEmailAndPassword(PDO $pdo, string $email, string $password)
{

    $query = "SELECT * from users  where email=:email ";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result && password_verify($password, $result['password'])) {
        return $result;
    } else {
        return false;
    }
}
