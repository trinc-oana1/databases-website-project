<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);

   if(isset($_POST['password']) && isset($_POST['repeat_password'])){
    $pass = mysqli_real_escape_string($conn, ($_POST['password']));
    $repeat_pass = mysqli_real_escape_string($conn, ($_POST['repeat_password']));
  
    if($pass != $repeat_pass){
        $message[] = 'Confirm password not matched!';
     }
  } else {
     $message[] = 'Password fields are not set!';
  }

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
    $message[] = 'User already exists'; 
 } else {
    if(isset($pass) && isset($repeat_pass)){
       $insert = mysqli_query($conn, "INSERT INTO `users`(name, username, password) VALUES('$name', '$username', '$pass')") or die('Query failed');
 
       if($insert){
          $message[] = 'Registered successfully!';
          header('location:login.php');
          exit;
       } else {
          $message[] = 'Registration failed!';
       }
    }
 }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
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

    input[type="repeat password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        background-color: #62b9fc; /* Change background color to blue */
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

   </style>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>register now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="enter name" class="box" required>
      <input type="username" name="username" placeholder="enter username" class="box" required>
      <input type="text" name="password" placeholder="enter password" class="box" required>
      <input type="text" name="repeat password" placeholder="repeat password" class="box" required>
      
      <input type="submit" name="submit" value="Register now" class="btn">
      <p>Already have an account? <a href="login.php">Login now</a></p>
   </form>

</div>

</body>
</html>