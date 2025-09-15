<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6a11cb 0%, #2575fc 50%, #ff6ec4 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 80%, rgba(255, 110, 196, 0.4) 0%, transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(106, 17, 203, 0.4) 0%, transparent 50%),
                        radial-gradient(circle at 40% 40%, rgba(37, 117, 252, 0.3) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(18px);
            border-radius: 24px;
            padding: 3rem;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            width: 100%;
            max-width: 500px;
        }

        .form-container h2 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #ff6ec4 50%, #6a11cb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        label {
            color: #fff;
            font-weight: 600;
        }

        input[type="text"],
        input[type="email"] {
            padding: 0.8rem 1rem;
            border-radius: 12px;
            border: none;
            font-size: 1rem;
            outline: none;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            backdrop-filter: blur(12px);
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            background: rgba(255, 255, 255, 0.35);
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.3);
        }

        input[type="submit"] {
            padding: 1rem;
            border-radius: 16px;
            border: none;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            color: #fff;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Update a Student</h2>
        <form action="<?= site_url('/students/update/') . $data['id'] ?>" method="post">
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" value="<?= $data['first_name'] ?>" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" value="<?= $data['last_name'] ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?= $data['email'] ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>
</body>

</html>
