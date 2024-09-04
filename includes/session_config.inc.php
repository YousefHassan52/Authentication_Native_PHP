<?php
ini_set("session.use_only_cookies", 1);
ini_set("session.use_strict_mode", 1);
/**
 * ini_set('session.use_only_cookies', 1);:

This line ensures that PHP sessions are only managed through cookies,
not through URLs (i.e., no session ID will be passed in the URL).
This improves security by preventing session hijacking,
which can occur if session IDs are exposed in URLs.

ini_set('session.use_strict_mode', 1);:

This enables strict mode for sessions.
In strict mode, PHP will refuse to accept uninitialized session IDs sent by the user (e.g., from a previous session that no longer exists).
This prevents attackers from guessing or predicting session IDs,
enhancing session security.
 */
session_set_cookie_params([
    "lifetime" => 1800,
    "domain" => 'localhost',
    "path" => '/',
    "secure" => true,
    "httponly" => true,
]);


session_start();

if (!isset($_SESSION['last_generated'])) {
    regenerating_session_id();
} else {
    $interval = 60 * 30;
    if (time() - $_SESSION['last_generated'] >= $interval) {
        regenerating_session_id();
    }
}


function regenerating_session_id()
{

    session_regenerate_id();
    $_SESSION["last_generated"] = time();
}
