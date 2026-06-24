<?php

include 'koneksi.php';

$timeout = 180;

if (
isset($_SESSION['last_activity'])
&&
(time()
- $_SESSION['last_activity'])
> $timeout
) {

    session_unset();
    session_destroy();

    header("Location:index.php");
    exit;
}

$_SESSION['last_activity'] = time();


if (!isset($_SESSION['login'])) {
    header("Location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="logo">
        <h1>Dashboard</h1>
        <p>Login Security System</p>
    </div>

    <h2>
        Selamat Datang,
        <?php
        echo htmlspecialchars(
            $_SESSION['username']
        );
        ?>
    </h2>

    <button
        onclick="
        window.location.href=
        'profile.php'
        "
    >
        Profile
    </button>

    <button
        style="margin-top:10px;"
        onclick="
        window.location.href=
        'logout.php'
        "
    >
        Logout
    </button>

</div>

</body>
</html>