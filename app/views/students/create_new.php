<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: o;
            background: linear-gradient(135deg, #bda0ddff, #c2d6f8ff);
            color: #fff;
        }
        .form-container{
            background: rgba(255, 255, 255, o.1);
            padding: 2rem;
            border-radius: 1rem;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            color: #fff;
            width: 100%;
            text-align: center;
        }
        h2{
            align-items: flex-start;
            margin-bottom: 1.5rem;
            font-size: 24px;
            color: #444;
        }
        label{
            display: block;
            text-align: left;
            margin: 0.1.5rem 0 0.2rem;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(90deg, #ff6a00, #ee0979);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        input{
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        input[type="submit"]{
            display: block;
            width: 100%;
            margin-top: 16px;
            padding: 0.0.75rem;
            border: none;
            border-radius: 0.5rem;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }
        input[type="submit"]:hover{
            background: linear-gradient(90deg, #00f2fe #4facfe);
            transform: scale(1.05);
        }    
    </style>
</head>

<body>
    <h2>Add a new student</h2>
<form action="<?= site_url('/students/create_new'); ?>" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>
        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <input type="submit" value="Add Student">
    </form>
</body>

</html>