<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: radial-gradient(circle at top left, #6a11cb, #2575fc, #ff6ec4);
            font-family: 'Poppins', sans-serif;
            color: white;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 16px;
            padding: 30px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            font-size: 26px;
            margin-bottom: 25px;
            font-weight: 600;
        }

        .error {
            color: #ff8080;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .success {
            color: #7CFC00;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .input-group {
            position: relative;
            margin-bottom: 25px;
        }

        .input-group input,
        .input-group select {
            width: 100%;
            padding: 14px 12px;
            border: none;
            border-radius: 25px;
            outline: none;
            font-size: 16px;
            color: white;
            background: rgba(255, 255, 255, 0.15);
        }

        .input-group label {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #ddd;
            pointer-events: none;
            transition: 0.3s ease all;
            font-size: 16px;
        }

        .input-group input:focus+label,
        .input-group input:not(:placeholder-shown)+label,
        .input-group select:focus+label,
        .input-group select:not([value=""])+label {
            top: -8px;
            left: 12px;
            font-size: 13px;
            color: #ff6ec4;
            text-shadow: 0 0 8px rgba(255, 110, 196, 0.8);
        }

        .input-group input:focus,
        .input-group select:focus {
            box-shadow: 0 0 8px #6a11cb, 0 0 12px #ff6ec4;
        }

        .btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(90deg, #6a11cb, #2575fc, #ff6ec4);
            color: white;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(106, 17, 203, 0.6), 0 0 30px rgba(255, 110, 196, 0.6);
        }

        .link {
            margin-top: 15px;
            display: block;
            font-size: 14px;
            color: #f0f0f0;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="card">
        <h2>Student Registration</h2>

        <?php if (!empty($error)): ?>
            <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php elseif (!empty($success)): ?>
            <p class="success"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="POST" action="<?= site_url('students/register') ?>">
            <div class="input-group">
                <input type="text" name="first_name" required placeholder=" ">
                <label for="first_name">First Name</label>
            </div>

            <div class="input-group">
                <input type="text" name="last_name" required placeholder=" ">
                <label for="last_name">Last Name</label>
            </div>

            <div class="input-group">
                <input type="email" name="email" required placeholder=" ">
                <label for="email">Email</label>
            </div>

            <div class="input-group">
                <input type="password" name="password" required placeholder=" ">
                <label for="password">Password</label>
            </div>

            <div class="input-group">
                <select name="role" required>
                    <option value="" disabled selected hidden></option>
                    <option value="student">Student</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="role">Role</label>
            </div>

            <button type="submit" class="btn">Register</button>

            <a href="<?= site_url('students/login') ?>" class="link">Already have an account? Login here</a>
        </form>
    </div>
</body>

</html>
