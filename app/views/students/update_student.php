<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>

<body>
    <h2>Update a student</h2>
    <form action="<?= site_url('/students/update/') . $data['id'] ?>" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $data['first_name'] ?>" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= $data['last_name'] ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $data['email'] ?>" required>

        <input type="submit" value="update">
    </form>
</body>

</html>