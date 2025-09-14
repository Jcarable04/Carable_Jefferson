<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body{
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin: o;
            background: linear-gradient(135deg, #bda0ddff, #c2d6f8ff);
            color: #fff;
        }
        .form-container{
            background: rgb(255, 255, 255, o.1);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 20px rgb(0, 0, 0, 0.2);
            color: #fff;
            width: 320px;
            text-align: center;
        }
        h2{
            margin-bottom: 24px;
            font-size: 24px;
            color: #444;
        }
        label{
            display: block;
            text-align: left;
            margin-bottom: 6px;
            font-size: 16px;
            font-weight: 600;
            background: linear-gradient(90deg, #ff6a00, #ee0979);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        inputt{
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 10px;
            margin-bottom: 15px;
        }
        input[type="submit"]{
            display: block;
            width: 100%;
            margin-top: 16px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg, #4facfe, #00f2fe);
            color: white;
            font-size: 16px;
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