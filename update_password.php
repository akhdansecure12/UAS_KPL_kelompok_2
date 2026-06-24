<?php

session_start();
include 'koneksi.php';

$username = $_SESSION['username'];

$old_password =
$_POST['old_password'];

$new_password =
$_POST['new_password'];

$query = mysqli_prepare(
    $conn,
    "SELECT password
    FROM users
    WHERE username=?"
);

mysqli_stmt_bind_param(
    $query,
    "s",
    $username
);

mysqli_stmt_execute($query);

$result =
mysqli_stmt_get_result($query);

$user =
mysqli_fetch_assoc($result);


// cek password lama
if (
!password_verify(
$old_password,
$user['password']
)
) {

    echo "<script>
    alert(
    'Password lama salah!'
    );
    window.location=
    'profile.php';
    </script>";

    exit;
}


// hash password baru
$new_hash =
password_hash(
$new_password,
PASSWORD_DEFAULT
);


// update password
$update =
mysqli_prepare(
$conn,
"UPDATE users
SET password=?
WHERE username=?"
);

mysqli_stmt_bind_param(
$update,
"ss",
$new_hash,
$username
);

mysqli_stmt_execute(
$update
);

echo "<script>
alert(
'Password berhasil diubah!'
);
window.location=
'dashboard.php';
</script>";

?>