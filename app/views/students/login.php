<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Student Login</h2>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="<?= site_url('students/login') ?>">
        <label>Last Name:</label><br>
        <input type="text" name="last_name" required><br><br>

        <label>First Name:</label><br>
        <input type="text" name="first_name" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="<?= site_url('students/register') ?>">Register here</a></p>
</body>
</html>
