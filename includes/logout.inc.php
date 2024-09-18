<?php
require_once "./session_config.inc.php"; // Ensure session is started

// Unset the userdata
unset($_SESSION['userdata']);

// Optionally destroy the session if you want to log the user out completely
// session_destroy();

// Redirect to a page (optional)
header("Location: ../index.php");
exit();
