<?php

include 'koneksi.php';

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// minimal password
if (strlen($password) < 8) {

    echo "<script>
    alert(
    'Password minimal 8 karakter!'
    );
    window.location=
    'register.php';
    </script>";

    exit;
}
// validasi password sama
if ($password != $confirm_password) {
    echo "<script>
            alert('Password tidak sama!');
            window.location='register.php';
          </script>";
    exit;
}


// cek username atau email sudah ada
$check = mysqli_prepare(
    $conn,
    "SELECT id FROM users WHERE username = ? OR email = ?"
);

mysqli_stmt_bind_param($check, "ss", $username, $email);
mysqli_stmt_execute($check);
$result = mysqli_stmt_get_result($check);

if (mysqli_num_rows($result) > 0) {
    echo "<script>
            alert('Username atau email sudah digunakan!');
            window.location='register.php';
          </script>";
    exit;
}


// hash password
$hashed_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);


// simpan data
$query = mysqli_prepare(
    $conn,
    "INSERT INTO users(username,email,password)
     VALUES(?,?,?)"
);

mysqli_stmt_bind_param(
    $query,
    "sss",
    $username,
    $email,
    $hashed_password
);

if (mysqli_stmt_execute($query)) {

    echo "<script>
            alert('Registrasi berhasil!');
            window.location='index.php';
          </script>";

} else {

    echo "<script>
            alert('Registrasi gagal!');
            window.location='register.php';
          </script>";
}

?>