<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $pass = mysqli_real_escape_string($conn, ($_POST['password']));
  
   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
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
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="username" name="username" placeholder="enter username" class="box" required>
      <input type="text" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="Login now" class="btn">
      <p>Don't have an account? <a href="register.php">Regiser now</a></p>
   </form>

</div>

</body>
</html>