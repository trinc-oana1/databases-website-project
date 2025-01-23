<?php
include 'config.php';
session_start();


if (!isset($_SESSION['user_id'])) {
   header('location: login.php');
   exit; 
}

$user_id = $_SESSION['user_id'];


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$wishlist_query = mysqli_query($conn, "SELECT * FROM `wishlist`") or die('Query failed: ' . mysqli_error($conn));
$wishlist_count = mysqli_num_rows($wishlist_query);



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = 1;

  
   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed: ' . mysqli_error($conn));

   if (mysqli_num_rows($select_cart) > 0) {
     
      $delete_wishlist = mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed: ' . mysqli_error($conn));

      if ($delete_wishlist) {
         $message[] = 'Product removed from wishlist!';
      } else {
         $message[] = 'Failed to remove product from wishlist!';
      }
   } else {
      $insert_cart = mysqli_query($conn, "INSERT INTO `cart` (user_id, name, price, quantity) VALUES ('$user_id', '$product_name', '$product_price', '$product_quantity')") or die('Query failed: ' . mysqli_error($conn));

      if ($insert_cart) {
         $delete_wishlist = mysqli_query($conn, "DELETE FROM `wishlist` WHERE name = '$product_name' AND user_id = '$user_id'") or die('Query failed: ' . mysqli_error($conn));

         if ($delete_wishlist) {
            $message[] = 'Product added to cart and removed from wishlist!';
         } else {
            $message[] = 'Failed to remove product from wishlist!';
         }
      } else {
         $message[] = 'Failed to add product to cart!';
      }
   }
}


if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];

   $delete_wishlist = mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$remove_id' AND user_id = '$user_id'") or die('Query failed: ' . mysqli_error($conn));

   if ($delete_wishlist) {
      $message[] = 'Product removed from wishlist!';
   } else {
      $message[] = 'Failed to remove product from wishlist!';
   }
}

if (isset($_GET['delete_all'])) {
   $delete_wishlist = mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = '$user_id'") or die('Query failed: ' . mysqli_error($conn));

   if ($delete_wishlist) {
      $message[] = 'All products deleted from wishlist!';
   } else {
      $message[] = 'Failed to delete products from wishlist!';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wishlist</title>

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div class="container">
      <?php @include 'header.php'; ?>

      <h1 class="heading">Wishlist</h1>

      <table>
         <thead>
            <tr>
               <th>Name</th>
               <th>Price</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $wishlist_query = mysqli_query($conn, "SELECT * FROM `wishlist`") or die('Query failed: ' . mysqli_error($conn));
            $grand_total = 0;

            if (mysqli_num_rows($wishlist_query) > 0) {
               while ($fetch_wishlist = mysqli_fetch_assoc($wishlist_query)) {
                  ?>
                  <tr>
                     <td><?php echo $fetch_wishlist['name']; ?></td>
                     <td>$<?php echo $fetch_wishlist['price']; ?>/-</td>
                     <td>
   <div class="button-container">
      <form action="" method="post">
         <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
         <input type="submit" name="add_to_cart" value="Add to Cart" class="add-to-cart-btn">
      </form>
      <a href="wishlist.php?remove=<?php echo $fetch_wishlist['id']; ?>" class="delete-btn" onclick="return confirm('Remove item from wishlist?');">Remove</a>
   </div>
</td>

                  </tr>
                  <?php
               }
            } else {
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No item added</td></tr>';
            }
            ?>
            <tr class="table-bottom">
   <td colspan="4">
      <?php if ($wishlist_count > 0): ?>
         <a href="wishlist.php?delete_all" onclick="return confirm('Delete all from wishlist?');" class="delete-btn">Delete All</a>
      <?php endif; ?>
   </td>
</tr>

         </tbody>
      </table>
   </div>
</body>
</html>


