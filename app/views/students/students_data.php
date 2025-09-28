<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Students</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Poppins', sans-serif; background: linear-gradient(135deg, #6a11cb 0%, #2575fc 50%, #ff6ec4 100%); min-height: 100vh; padding: 2rem; }
body::before { content: ''; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: radial-gradient(circle at 20% 80%, rgba(255,110,196,0.4) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(106,17,203,0.4) 0%, transparent 50%), radial-gradient(circle at 40% 40%, rgba(37,117,252,0.3) 0%, transparent 50%); pointer-events: none; z-index: -1; }
.container { max-width: 1200px; margin: 0 auto; }
h2 { text-align:center; font-size:3rem; font-weight:700; margin-bottom:2rem; background: linear-gradient(135deg,#fff 0%,#ff6ec4 50%,#6a11cb 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; text-shadow:0 0 30px rgba(255,255,255,0.6); }
.add-button { display:inline-block; margin-bottom:1.5rem; padding:0.8rem 1.2rem; border-radius:12px; background:linear-gradient(135deg,#2575fc,#6a11cb); color:#fff; font-weight:600; text-decoration:none; transition:0.3s; }
.add-button:hover { transform:scale(1.05); box-shadow:0 8px 25px rgba(255,255,255,0.4); }
table { width:100%; border-collapse: separate; border-spacing:0 16px; }
th { padding:1rem; text-align:left; font-weight:600; color:#fff; text-transform:uppercase; font-size:1rem; }
tr { background:rgba(255,255,255,0.25); backdrop-filter:blur(14px); border-radius:16px; transition:0.3s; }
tr:hover { transform:translateY(-4px) scale(1.02); box-shadow:0 10px 30px rgba(255,110,196,0.4); }
td { padding:1rem; color:#fff; font-size:1rem; }
td:first-child { font-weight:700; color:#ff6ec4; }
.btn { display:inline-block; padding:0.5rem 1rem; border-radius:12px; border:none; color:#fff; font-weight:600; text-decoration:none; cursor:pointer; transition:0.3s; }
.btn-update { background:linear-gradient(135deg,#2575fc,#6a11cb); }
.btn-delete { background:linear-gradient(135deg,#ff6ec4,#ff512f); }
.btn:hover { transform:scale(1.05); box-shadow:0 6px 20px rgba(255,255,255,0.4); }
.pagination-wrapper { margin-top:2rem; text-align:center; }
.pagination-wrapper ul { list-style:none; display:inline-flex; padding:0; }
.pagination-wrapper li { margin:0 5px; }
.pagination-wrapper a { display:block; padding:0.5rem 0.8rem; background:rgba(255,255,255,0.2); color:#fff; border-radius:8px; text-decoration:none; transition:0.3s; }
.pagination-wrapper a:hover { background:#ffffff33; }
.pagination-wrapper .active a { background:#ff6ec4; font-weight:700; }
.search-form { text-align:right; margin-bottom:1rem; }
.search-form input[type="text"] { padding:0.5rem 1rem; border-radius:8px; border:none; margin-right:0.5rem; }
.search-form button { padding:0.5rem 1rem; border-radius:8px; border:none; background:#2575fc; color:#fff; cursor:pointer; transition:0.3s; }
.search-form button:hover { background:#6a11cb; }

/* Auth forms */
.auth-forms { display:flex; gap:30px; margin-top:40px; flex-wrap: wrap; }
.auth-box { flex:1; background:rgba(255,255,255,0.9); padding:20px; border-radius:14px; min-width:280px; }
.auth-box h3 { text-align:center; margin-bottom:15px; color:#333; }
.auth-box input, .auth-box select { width:100%; padding:10px; margin:8px 0; border:1px solid #ddd; border-radius:8px; }
.auth-box button { width:100%; padding:10px; background:#2575fc; color:#fff; border:none; border-radius:8px; font-weight:600; }
.alert { padding:10px 14px; border-radius:8px; margin-bottom:12px; }
.alert-success { background:#e6ffef; color:#067a3f; border:1px solid #b8f0d0; }
.alert-danger  { background:#ffecec; color:#b30000; border:1px solid #f5c2c2; }
</style>
</head>
<body>
<div class="container">
    <h2>Students List</h2>

    <?php if(!empty($logged_in)): ?>
        <a href="<?= site_url('students/create_new') ?>" class="add-button">➕ Add New Student</a>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if(isset($flash) && $flash): ?>
        <div class="alert <?= ($flash['type'] ?? 'success') === 'success' ? 'alert-success' : 'alert-danger' ?>">
            <?= htmlspecialchars($flash['message'] ?? '') ?>
        </div>
    <?php endif; ?>

    <!-- Search Form -->
    <form method="get" class="search-form">
        <input type="text" name="q" placeholder="Search..." value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q']) : '' ?>">
        <button type="submit">Search</button>
    </form>

    <!-- Students Table -->
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php if(!empty($students) && is_array($students)): ?>
            <?php foreach($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= htmlspecialchars($student['first_name']) ?></td>
                    <td><?= htmlspecialchars($student['last_name']) ?></td>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                    <td>
                        <?php if(!empty($logged_in)): ?>
                            <a href="<?= site_url('students/update/'.$student['id']) ?>" class="btn btn-update">✏ Update</a>
                            <a href="<?= site_url('students/delete/'.$student['id']) ?>" class="btn btn-delete">🗑 Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="5" style="text-align:center;">No records found.</td></tr>
        <?php endif; ?>
    </table>

    <!-- Pagination -->
    <div class="pagination-wrapper"><?= $page ?? '' ?></div>

    <!-- Login/Register -->
    <?php if(empty($logged_in)): ?>
    <div class="auth-forms">
        <div class="auth-box">
            <h3>Login</h3>
            <form method="post" action="<?= site_url('students/login_process') ?>">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
        <div class="auth-box">
            <h3>Register</h3>
            <form method="post" action="<?= site_url('students/register_process') ?>">
                <input type="text" name="firstname" placeholder="First name" required>
                <input type="text" name="lastname" placeholder="Last name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password (min 6 chars)" required>
                <select name="role">
                    <option value="student" selected>Student</option>
                    <option value="admin">Admin</option>
                </select>
                <button type="submit">Create account</button>
            </form>
        </div>
    </div>
    <?php else: ?>
        <a href="<?= site_url('students/logout') ?>" class="add-button">🚪 Logout</a>
    <?php endif; ?>
</div>
</body>
</html>
