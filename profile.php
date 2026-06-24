<?php


include 'koneksi.php';
$timeout = 180;

if (
isset($_SESSION['last_activity'])
&&
(time()
- $_SESSION[
'last_activity'
])
> $timeout
) {

session_unset();
session_destroy();

header(
"Location:index.php"
);

exit;
}

$_SESSION[
'last_activity'
] = time();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];

$query = mysqli_prepare(
    $conn,
    "SELECT * FROM users
    WHERE username = ?"
);

mysqli_stmt_bind_param(
    $query,
    "s",
    $username
);

mysqli_stmt_execute($query);

$result = mysqli_stmt_get_result($query);

$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="logo">
        <h1>User Profile</h1>
        <p>Security Account Settings</p>
    </div>

    <p>
        <strong>Username:</strong><br>
        <?php
        echo htmlspecialchars(
        $user['username']
        );
        ?>
    </p>
    <br>
    <p>
        <strong>Email:</strong><br>
        <?php
        echo htmlspecialchars(
        $user['email']
        );
        ?>
    </p>

    <hr style="margin:20px 0;">

    <h2>Ganti Password</h2>

    <form
        action="update_password.php"
        method="POST"
    >

        <label>Password Lama</label>
        <input
            type="password"
            name="old_password"
            required
        >

        <label>Password Baru</label>
        <input
            type="password"
            name="new_password"
            required
        >

        <button type="submit">
            Update Password
        </button>

    </form>

    <button
        style="margin-top:10px;"
        onclick="
        window.location.href=
        'dashboard.php'
        "
    >
        Kembali
    </button>

</div>

</body>
</html>