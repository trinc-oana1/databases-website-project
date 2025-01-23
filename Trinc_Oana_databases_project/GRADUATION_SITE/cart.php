<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'] ?? null;

if (isset($_GET['logout'])) {
   session_destroy();
   header('Location: login.php');
   exit();
}

if (isset($_POST['add_to_cart'])) {
   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity = $_POST['product_quantity'];

   $stmt = $conn->prepare("SELECT * FROM `cart` WHERE name = ? AND user_id = ?");
   $stmt->bind_param('si', $product_name, $user_id);
   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      $message[] = 'Product already added to cart!';
   } else {
      $stmt = $conn->prepare("INSERT INTO `cart` (user_id, name, price, quantity) VALUES (?, ?, ?, ?)");
      $stmt->bind_param('isisi', $user_id, $product_name, $product_price, $product_quantity);
      $stmt->execute();
      $message[] = 'Product added to cart!';
   }
   $stmt->close();
}

if (isset($_POST['update_cart'])) {
   $update_quantity = $_POST['cart_quantity'];
   $update_id = $_POST['cart_id'];
   $stmt = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $stmt->bind_param('ii', $update_quantity, $update_id);
   $stmt->execute();
   $message[] = 'Cart quantity updated successfully!';
   $stmt->close();
}

if (isset($_GET['remove'])) {
   $remove_id = $_GET['remove'];
   $stmt = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $stmt->bind_param('i', $remove_id);
   $stmt->execute();
   $stmt->close();
   header('Location: cart.php');
   exit();
}

if (isset($_GET['delete_all'])) {
   $stmt = $conn->prepare("DELETE FROM `cart` WHERE user_id = ?");
   $stmt->bind_param('i', $user_id);
   $stmt->execute();
   $stmt->close();
   header('Location: cart.php');
   exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

   <?php
   if (isset($message)) {
      foreach ($message as $msg) {
         echo '<div class="message" onclick="this.remove();">' . htmlspecialchars($msg) . '</div>';
      }
   }
   ?>

   <div class="container">
      <?php @include 'header.php'; ?>

      <h1 class="heading">Shopping Cart</h1>

      <table>
         <thead>
            <tr>
               <th>Name</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Total Price</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $stmt = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $grand_total = 0;

            if ($result->num_rows > 0) {
               while ($fetch_cart = $result->fetch_assoc()) {
                  $sub_total = $fetch_cart['price'] * $fetch_cart['quantity'];
                  $grand_total += $sub_total;
                  ?>
                  <tr>
            
                     <td><?php echo htmlspecialchars($fetch_cart['name']); ?></td>
                     <td>$<?php echo htmlspecialchars($fetch_cart['price']); ?>/-</td>
                     <td>
                        <form action="" method="post">
                           <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                           <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                           <input type="submit" name="update_cart" value="Update" class="option-btn">
                        </form>
                     </td>
                     <td>$<?php echo $sub_total; ?>/-</td>
                     <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('Remove item from cart?');">Remove</a></td>
                  </tr>
                  <?php
               }
            } else {
               echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No items added</td></tr>';
            }
            ?>
            <tr class="table-bottom">
               <td colspan="4">Grand Total:</td>
               <td>$<?php echo $grand_total; ?>/-</td>
               <td><a href="cart.php?delete_all" onclick="return confirm('Delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Delete All</a></td>
            </tr>
         </tbody>
      </table>

      <div class="cart-btn">
         <?php
         if ($result->num_rows > 0) {
            echo '<a href="order.php" user_id=' . $user_id . '" class="btn">Buy</a>';
         } else {
            echo '<span class="error-msg">There are no items in the cart.</span>';
         }
         ?>
      </div>
   </div>

</body>
</html>
