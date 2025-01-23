<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location: login.php');
}

if (isset($_GET['logout'])) {
   unset($user_id);
   session_destroy();
   header('location: login.php');
}

$shop_id = 1; 
$products_query = mysqli_query($conn, "SELECT product_name, price, description FROM `products` WHERE shop_id = $shop_id") or die('query failed');




if (isset($_POST['add_to_cart'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($select_cart) > 0) {
      $message[] = 'product already added to cart!';
   } else {
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity')") or die('query failed');
      $message[] = 'product added to cart!';
   }
}

if (isset($_POST['add_to_wishlist'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   

   $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if (mysqli_num_rows($select_wishlist) > 0) {
      $message[] = 'product already added to wishlist!';
   } else {
      mysqli_query($conn, "INSERT INTO `wishlist`(name, price, user_id) VALUES('$product_name', '$product_price', '$user_id')") or die('query failed');
      $message[] = 'product added to wishlist!';
      header('location:wishlist.php');
      exit;
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
      }
   }
   ?>

   <div class="container">
      <?php @include 'header.php'; ?>

      <h1 class="heading">Shop</h1>

      <div class="product">
         <?php
         if (mysqli_num_rows($products_query) > 0) {
            while ($fetch_product = mysqli_fetch_assoc($products_query)) {
         ?>
               <div class="product-item">
                  <h4><?php echo $fetch_product['product_name']; ?></h4>
                                    <p class="price">$<?php echo $fetch_product['price']; ?>/-</p>
                                    <p class="description"><?php echo $fetch_product['description']; ?></p>
                  <div class="actions">
                     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <input type="hidden" name="product_quantity" value="1">
                        <button type="submit" name="add_to_cart" class="add-to-cart">Add to Cart</button>
                     </form>
                     <form action="shop1.php" method="post">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['product_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                        <button type="submit" name="add_to_wishlist" class="add-to-wishlist">Add to Wishlist</button>
                     </form>
                  </div>
               </div>
         <?php
            }
         } else {
            echo '<p>No products available</p>';
         }
         ?>
      </div>
   </div>
</body>
</html>


