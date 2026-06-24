<?php

// SESSION SECURITY
if (session_status() === PHP_SESSION_NONE) {

    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'Lax'
    ]);

    session_start();
}


// SECURITY HEADERS
header("X-Frame-Options: DENY");
header("X-Content-Type-Options: nosniff");
header("X-XSS-Protection: 1; mode=block");
header("Referrer-Policy: no-referrer");


header_remove("X-Powered-By");


// DATABASE
$server = "localhost";
$username = "root";
$password = "";
$database = "db_security";

$conn = mysqli_connect(
    $server,
    $username,
    $password,
    $database
);

if (!$conn) {
    die(
        "Koneksi gagal: "
        . mysqli_connect_error()
    );
}

?>