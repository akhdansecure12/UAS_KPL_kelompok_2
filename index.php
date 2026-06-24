<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="logo">
        <h1>Login Security</h1>
        <p>Secure Authentication System</p>
    </div>

    <h2>Login</h2>

    <form action="login_process.php" method="POST">

        <label>Username</label>
        <input
            type="text"
            name="username"
            required
        >

        <label>Password</label>
        <input
            type="password"
            name="password"
            required
        >

        <button type="submit">
            Login
        </button>

    </form>

    <p>
        Belum punya akun?
        <a href="register.php">
            Register
        </a>
    </p>

</div>

</body>
</html>