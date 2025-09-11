<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f7f8fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4a4a4a;
        }

        /* Add Student Button */
        .add-button {
            display: inline-block;
            background-color: #28a745;
            color: #fff;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.2s ease;
            margin-bottom: 20px;
        }

        .add-button:hover {
            background-color: #218838;
        }

        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        table th, table td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f1f1f1;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        /* Action Buttons */
        .btn {
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            margin-right: 5px;
            transition: 0.2s ease;
        }

        .btn-update {
            background: #007bff;
            color: #fff;
        }
        .btn-update:hover {
            background: #0056b3;
        }

        .btn-delete {
            background: #dc3545;
            color: #fff;
        }
        .btn-delete:hover {
            background: #b52a37;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Students List</h2>

       
        <a href="<?= site_url('students/create_new') ?>" class="add-button">➕ Add New Student</a>

       
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($data as $student): ?>
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
    </div>
</body>
</html>
