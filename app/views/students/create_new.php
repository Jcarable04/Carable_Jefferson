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
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: #fff;
        }
        .form-container{
            background: rgb(255, 255, 255, o.1);
            padding: 2rem;
            border-radius: 1rem;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 25px rgb(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }
        h2{
            text-align: center;
            margin-bottom: 1.5rem;
        }
        label{
            display: block;
            margin: 0.5rem 0 0.2rem;
            font-weight: 600;
        }
        input[type="text"],
        input[type="email"]{
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            font-size: 1rem;
        }
        input[type="submit"]{
            width: 100%;
            padding: 0.75rem;
            border: none;
            border-radius: 0.5rem;
            background: linear-gradient(135deg, #ff512f, #dd2476);
            color: white;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s ease;
        }
        input[type="submit"]:hover{
            transform: scale(1.05);
            background: linear-gradient(135deg, #dd2476, #ff512f);
        }
        .back-link{
          display: block;
          text-align: center;
          margin-top: 1rem;
          color: #fff;
          text-decoration: none;
          font-weight: bold;  
        }
        .back-link:hover{
            text-decoration: underline;
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