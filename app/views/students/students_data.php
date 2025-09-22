<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
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

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #ffffff 0%, #ff6ec4 50%, #6a11cb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(255, 255, 255, 0.6);
        }

        .add-button {
            display: inline-block;
            margin-bottom: 1.5rem;
            padding: 0.8rem 1.2rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #2575fc, #6a11cb);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }

        .add-button:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 16px;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            font-size: 1rem;
        }

        tr {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(14px);
            border-radius: 16px;
            transition: 0.3s;
        }

        tr:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow: 0 10px 30px rgba(255, 110, 196, 0.4);
        }

        td {
            padding: 1rem;
            color: #fff;
            font-size: 1rem;
        }

        td:first-child {
            font-weight: 700;
            color: #ff6ec4;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            border: none;
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-update {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }

        .btn-delete {
            background: linear-gradient(135deg, #ff6ec4, #ff512f);
        }

        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body>
    <div class="container">
    <h2>Students List</h2>

    <form action="<?= site_url('students') ?>" method="get" class="mb-3" style="text-align:right;">
        <input type="text" name="q" placeholder="Search" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" style="padding:0.5rem; border-radius:8px;">
        <button type="submit" style="padding:0.5rem 1rem; border-radius:8px; background:#2575fc; color:white;">Search</button>
    </form>

    <a href="<?= site_url('students/create_new') ?>" class="add-button">➕ Add New Student</a>

    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['first_name'] ?></td>
                <td><?= $student['last_name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td>
                    <a href="<?= site_url('students/update/') . $student['id'] ?>" class="btn btn-update">✏ Update</a>
                    <a href="<?= site_url('students/delete/') . $student['id'] ?>" class="btn btn-delete">🗑 Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="mt-3">
        <?= $page; // pagination links ?>
    </div>
</div>

</body>

</html>