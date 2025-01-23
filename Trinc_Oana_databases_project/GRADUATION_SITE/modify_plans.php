<?php

include 'config.php';
session_start();

if (!isset($_SESSION['admin'])) {
   header('Location: admin_login.php');
   exit();
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_plan'])) {
   $pack_name = $_POST['pack_name'];
   $price = $_POST['price'];
   $content = $_POST['content'];

   $stmt = $conn->prepare("INSERT INTO pricing (pack_name, price, content) VALUES (?, ?, ?)");
   $stmt->bind_param('sds', $pack_name, $price, $content);
   $stmt->execute();
   $stmt->close();
   header('Location: modify_plans.php');
   exit();
}

if (isset($_GET['delete'])) {
   $plan_id = $_GET['delete'];
   $stmt = $conn->prepare("DELETE FROM pricing WHERE id = ?");
   $stmt->bind_param('i', $plan_id);
   $stmt->execute();
   $stmt->close();
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
   <title>Modify Packages and Plans</title>
   <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background: url('images/background.png') no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px 10px;
            background-color: var(--transparent-white);
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-container h3 {
            margin-bottom: 20px;
        }

        .form-container form {
            text-align: center;
        }

        .form-container p {
            font-size: 15px;
            text-align: center;
            margin-top: 10px;
        }

        .form-container p a {
            color: var(--blue);
            text-decoration: none;
        }

        .form-container p a:hover {
            color: var(--blue);
            text-decoration: none;
        }

        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .form-container .btn {
            background-color: var(--blue);
            color: var(--black);
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

</head>
<body>
   <div class="container">
      <h1>Modify Packages and Plans</h1>

    
      <form action="modify_plans.php" method="post">
         <label for="pack_name">Pack Name:</label>
         <input type="text" id="pack_name" name="pack_name" required>
         <label for="price">Price:</label>
         <input type="number" id="price" name="price" step="0.01" required>
         <label for="content">Content:</label>
         <textarea id="content" name="content" required></textarea>
         <button type="submit" name="add_plan">Add Plan</button>
      </form>

      <hr>

      <h2>Existing Plans</h2>
      <ul>
         <?php
         $result = $conn->query("SELECT * FROM pricing");
         while ($row = $result->fetch_assoc()) {
            echo '<li>' . htmlspecialchars($row['pack_name']) . ' - $' . htmlspecialchars($row['price']) . '/- <a href="modify_plans.php?delete=' . htmlspecialchars($row['id']) . '">Delete</a></li>';
         }
         ?>
      </ul>
   </div>
</body>
</html>
