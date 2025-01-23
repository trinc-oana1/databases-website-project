<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>pricing</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

<?php @include 'header.php'; ?>

<section class="pricing">

   <h1 class="heading">prices, packs and services</h1>

   <div class="box-container">
   <?php
      
      include 'config.php';
      $sql = "SELECT * FROM pricing";
      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
         
         while ($row = $result->fetch_assoc()) {
            echo '<div class="box">';
            echo '<h3>' . htmlspecialchars($row['pack_name']) . '</h3>';
            echo '<div class="price">' . htmlspecialchars($row['price']) . 'LEI/-</div>';
            echo '<div class="list">';
            echo '<p> <i class="fas fa-check"></i> ' . htmlspecialchars($row['content']) . '</p>';
            echo '</div>';
            echo '<a href="contact.php" class="btn">Choose Plan</a>';
            echo '</div>';
         }
      } else {
         echo '<p>No plans available.</p>';
      }

      $conn->close();
      ?>
   </div>
</section>

      

<section class="reviews">

   <h1 class="heading">happy clients</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/client1.jpg" alt="" style="width: 250px; height: 300px; ">
            <h3>UTCN graduation</h3>
            <p>Graduation at the Technical University of Cluj Napoca</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/client2.jpg" alt="">

            <h3>UBB graduation</h3>
            <p>Graduation at the Babeș-Bolyai University </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/client3.jpg" alt="">

            <h3>USAMV graduation</h3>
            <p>Graduation at the University of Agricultural Sciences and Veterinary Medicine of Cluj-Napoca</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/client4.jpg" alt="">

            <h3>UMF graduation</h3>
            <p>Graduation at the Iuliu Hațieganu University of Medicine and Pharmacy</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
            </div>
         </div>

         

      </div>

      <div class="swiper-pagination"></div>
</div>
</section>

<?php @include 'footer.php'; ?>

</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>
    var swiper = new Swiper('.reviews-slider', {
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
  </script>

</body>
</html>
