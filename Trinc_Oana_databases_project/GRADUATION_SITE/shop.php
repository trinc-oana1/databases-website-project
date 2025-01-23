<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   <div class="container">

<?php @include 'header.php'; ?>

<section class="services">

   <h1 class="heading">Services</h1>

   <div class="swiper service-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/shop1.jpg" alt="" style="width: 300px; height: 300px;">
            <div class="content">
               <h3>Graduation regalia</h3>
               <p>.....</p>
               <a href="shop1.php?shop_id=1" class="btn">Choose yours</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/shop2.jpg" alt="" style="width: 300px; height: 300px;">
            <div class="content">
               <h3>Diploma templates</h3>
               <p>.....</p>
               <a href="shop2.php?shop_id=2" class="btn">Choose yours</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/shop3.jpg" alt="" style="width: 300px; height: 300px;">
            <div class="content">
               <h3>Photos & video plans</h3>
               <p>.....</p>
               <a href="shop3.php?shop_id=3" class="btn">Choose yours</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/shop4.jpg" alt="" style="width: 300px; height: 300px;">
            <div class="content">
               <h3>Food menu</h3>
               <p>...</p>
               <a href="shop4.php?shop_id=4" class="btn">Choose yours</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/shop5.jpg" alt="" style="width: 300px; height: 300px;">
            <div class="content">
               <h3>Drinks menu</h3>
               <p>....</p>
               <a href="shop5.php?shop_id=5" class="btn">Choose yours</a>
            </div>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<?php @include 'footer.php'; ?>

</div>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="js/script.js"></script>

<script>

   var serviceSwiper = new Swiper('.service-slider', {
      loop: true,
      slidesPerView: 2,
      spaceBetween: 30,
      autoplay: {
         delay: 5000,
      },
      pagination: {
         el: '.swiper-pagination',
         clickable: true,
      },
      breakpoints: {
         768: {
            slidesPerView: 3,
            spaceBetween: 30,
         },
         1024: {
            slidesPerView: 4,
            spaceBetween: 30,
         },
      },
   });
   

</script>


</body>
</html>