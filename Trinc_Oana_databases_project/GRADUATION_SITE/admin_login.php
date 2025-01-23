<?php
session_start();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($username === 'admin' && $password === 'admin') {
   $_SESSION['admin'] = true;
   header('Location: modify_plans.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Login</title>
   <style>
       body {
           font-family: Arial, sans-serif;
           background-color: #f2f2f2;
           margin: 0;
           padding: 0;
       }

       .form-container {
           background-color: #fff;
           max-width: 400px;
           margin: 50px auto;
           padding: 20px;
           border-radius: 8px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
       }

       .form-container h3 {
           text-align: center;
           margin-bottom: 20px;
           text-transform: uppercase;
       }

       .box {
           width: 100%;
           padding: 10px;
           margin-bottom: 15px;
           border: 1px solid #ccc;
           border-radius: 4px;
           box-sizing: border-box;
       }

       .btn {
           width: 100%;
           padding: 10px;
           background-color: #4CAF50;
           color: #fff;
           border: none;
           border-radius: 4px;
           cursor: pointer;
           transition: background-color 0.3s;
       }

       .btn:hover {
           background-color: #45a049;
       }

       .message {
           padding: 10px;
           margin-bottom: 15px;
           background-color: #f2dede;
           border: 1px solid #ebccd1;
           color: #a94442;
           border-radius: 4px;
       }

       .message:last-child {
           margin-bottom: 0;
       }

       p {
           margin-top: 15px;
           text-align: center;
       }

       a {
           color: #4CAF50;
           text-decoration: none;
       }

       a:hover {
           text-decoration: underline;
       }
   </style>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
      <h1>Admin Login</h1>
      <?php

      if (isset($_POST['username']) && isset($_POST['password']) && ($_POST['username'] !== 'admin' || $_POST['password'] !== 'admin')) {
         echo '<p class="message">Incorrect username or password. Please try again.</p>';
      }
      ?>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
         <input type="text" name="username" placeholder="Enter username" class="box" required>
         <input type="text" name="password" placeholder="Enter password" class="box" required>
         <input type="submit" name="submit" value="Login now" class="btn">
      </form>
   </div>
</body>
</html>
