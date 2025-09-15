<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students</title>
   <style> * { margin: 0; padding: 0; box-sizing: border-box; } body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 50%, #ff6ec4 100%); min-height: 100vh; padding: 2rem; position: relative; overflow-x: auto; } body::before { content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at 20% 80%, rgba(255, 110, 196, 0.4) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(106, 17, 203, 0.4) 0%, transparent 50%), radial-gradient(circle at 40% 40%, rgba(37, 117, 252, 0.3) 0%, transparent 50%); pointer-events: none; z-index: -1; } .dashboard-container { max-width: 1200px; margin: 0 auto; } .header { text-align: center; margin-bottom: 3rem; } .header h1 { font-size: 3rem; font-weight: 700; background: linear-gradient(135deg, #ffffff 0%, #ff6ec4 50%, #6a11cb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow: 0 0 30px rgba(255, 255, 255, 0.6); } .table-container { background: rgba(255, 255, 255, 0.25); /* more solid */ backdrop-filter: blur(18px); border-radius: 24px; padding: 2rem; box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3); border: 1px solid rgba(255, 255, 255, 0.2); } .student-table { width: 100%; border-collapse: separate; border-spacing: 0 16px; } .table-header th { padding: 1rem; text-align: left; font-weight: 600; color: #fff; text-transform: uppercase; font-size: 1rem; } .student-row { background: rgba(255, 255, 255, 0.3); backdrop-filter: blur(14px); border-radius: 16px; transition: 0.3s; } .student-row:hover { transform: translateY(-4px) scale(1.02); box-shadow: 0 10px 30px rgba(255, 110, 196, 0.4); } .student-row td { padding: 1rem; color: #fff; font-size: 1rem; } .student-row td:first-child { font-weight: 700; color: #ff6ec4; } .action-buttons { display: flex; gap: 0.5rem; } .action-btn { width: 40px; height: 40px; border-radius: 12px; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1rem; color: #fff; transition: 0.3s; } .edit-btn { background: linear-gradient(135deg, #2575fc, #6a11cb); } .delete-btn { background: linear-gradient(135deg, #ff6ec4, #ff512f); } .action-btn:hover { transform: scale(1.1); box-shadow: 0 6px 20px rgba(255, 255, 255, 0.4); } </style
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
