<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect('localhost', 'root', 'MySQL', 'graduation');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $number = $_POST['number'];
    $pack = $_POST['pack'];
    $address = $_POST['address'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact (name, username, number, pack, address, message) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $bind = $stmt->bind_param("ssisss", $name, $username, $number, $pack, $address, $message);
    if ($bind === false) {
        die("Error binding parameters: " . $stmt->error);
    }

    $exec = $stmt->execute();
    if ($exec === false) {
        die("Error executing statement: " . $stmt->error);
    }

    $stmt->close();
    mysqli_close($conn);

    header('Location: contact.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Contact</title>

   <!-- Font Awesome CDN Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- Swiper CSS Link -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- Custom CSS File Link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<div class="container">

<?php @include 'header.php'; ?>

<section class="contact">
   <h1 class="heading">Contact Us</h1>

   <form action="" method="post">
      <div class="flex">
         <div class="inputBox">
            <span>Full name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Username</span>
            <input type="text" placeholder="Enter your username" name="username" required>
         </div>
         <div class="inputBox">
            <span>Phone number</span>
            <input type="number" placeholder="Enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Choose pack</span>
            <select name="pack">
               <option value="basic">Basic Pack</option>
               <option value="upgraded">Upgraded Pack</option>
               <option value="premium">Premium Pack</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address</span>            
            <textarea name="address" placeholder="Enter your address" required cols="30" rows="10"></textarea>
         </div>
         <div class="inputBox">
            <span>Do you want to leave us a message?</span>            
            <textarea name="message" placeholder="Enter your message" required cols="30" rows="10"></textarea>
         </div>
      </div>
      <input type="submit" value="Send message" name="send" class="btn">
   </form>
</section>

<?php @include 'footer.php'; ?>

</div>

</body>
</html>
