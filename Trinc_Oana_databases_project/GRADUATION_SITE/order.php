<?php

include 'config.php';


error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect('localhost', 'root', 'MySQL', 'graduation');

$ct = $ct ?? 0;


if ($ct > 0) {
    $total = 0;
    $items = "Items:";
    while ($res = mysqli_fetch_assoc($result)) {
        $total += $res["price"];
        $item = $res["name"] . " x " . $res["quantity"] . "<br>";
        $items .= $item;
    }
   

    $rand = $total * 11.5;
} else {
    $error_message = "There are no items in your cart.";
    $go_back_url = "shop.php"; 
}

if (isset($_POST['send'])) {
   if ($ct <= 0) {
      $error_message = "There are no items in your cart.";
      $go_back_url = "cart.php"; 
      $name = $_POST['name'];
      $username = $_POST['username'];
      $number = $_POST['number'];
      $address = $_POST['address'];
      $message = $_POST['message'];

      $insert = "INSERT INTO `orders`(`name`, `username`, `number`, `address`, `message`, `items`, `total`) VALUES ('$name','$username','$number','$address','$message', '$items','$total')";

      mysqli_query($conn, $insert);


      $delete1 = "DELETE FROM `cart` WHERE user_id = $user_id";
      mysqli_query($conn, $delete1);

      header('location:order.php');
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>
   
<div class="container">

<?php @include 'header.php'; ?>

<section class="order">

   <?php if (isset($error_message)) : ?>
      <p><?php echo $error_message; ?></p>
      <a href="<?php echo $go_back_url; ?>" class="btn">Go Back</a>
   <?php else : ?>

   <h1 class="heading">Place your order!</h1>

   <form action="" method="post">

      <div class="flex">

         <div class="inputBox">
            <span>Full name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>

         <div class="inputBox">
            <span>Username</span>
            <input type="username" placeholder="Enter your username" name="username" required>
         </div>

         <div class="inputBox">
            <span>Phone number</span>
            <input type="text" placeholder="Enter your number" name="number" required>
         </div>

         <div class="inputBox">
            <span>Address</span>            
            <textarea name="address" placeholder="Enter your address" required cols="30" rows="10"></textarea>
         </div>

         <div class="inputBox">
            <span>Do you have any additional message?</span>            
            <textarea name="message" placeholder="Enter your message" required cols="30" rows="10"></textarea>
         </div>

      </div>

      <input type="submit" value="send" name="send" class="btn">

   </form>

   <?php endif; ?>

</section>

<?php @include 'footer.php'; ?>

</div>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<!-- Custom CSS file link -->
<link rel="stylesheet" href="css/style.css">

</body>
</html>

