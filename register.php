<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <div class="logo">
        <h1>Login Security</h1>
        <p>Secure Authentication System</p>
    </div>

    <form action="register_process.php" method="POST">

        <label>Username</label>
        <input type="text" name="username" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Konfirmasi Password</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Register</button>

    </form>

    <p>Sudah punya akun?
        <a href="index.php">Login</a>
    </p>
</div>

</body>
</html>