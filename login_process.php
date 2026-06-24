<?php

include 'koneksi.php';

$username = trim($_POST['username']);
$password = $_POST['password'];

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


// cek user dan password
if (
$user &&
password_verify(
$password,
$user['password']
)
) {

    $_SESSION['login'] = true;
    $_SESSION['username'] =
    $user['username'];

    header(
    "Location:dashboard.php"
    );
    exit;

} else {

    echo "<script>
    alert(
    'Username atau Password salah!'
    );
    window.location=
    'index.php';
    </script>";
}

?>