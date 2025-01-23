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
   <div class="container">

<?php @include 'header.php'; ?>

<section class="home">

<div class="swiper-slide slide" style="background:url(images/slide2.jpg) no-repeat">
            <div class="content">
               <h3>Happy graduation!</h3>
               <p>Let us take care of one of the most important days in your life. Check our services.</p>
               <a href="about.php" class="btn">About Us</a>
            </div>
         </div>

  
</section>

<section class="services">

   <h1 class="heading">Our services</h1>

   <div class="swiper service-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="images/service1.jpg" alt="" style="width: 300px; height: 300px; ">
            <div class="content">
               <h3>graduation regalia</h3>
               <p>Excited to see yourself in the graduation regalia? Let us take care of it and find your best suit.</p>
               <a href="about.php" class="btn">about us</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/service2.jpg" alt="" style="width: 300px; height: 300px; ">
            <div class="content">
               <h3>diploma</h3>
               <p>Excited to get yor diploma. We have a lot of templates you can choose from.</p>
               <a href="about.php" class="btn">about us</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/service3.jpg" alt="" style="width: 300px; height: 300px; " >
            <div class="content">
               <h3>graduation ceremony</h3>
               <p>Excited for the graduation ceremony. We can plan every detail of it..</p>
               <a href="about.php" class="btn">about us</a>
            </div>
         </div>

         <div class="swiper-slide slide">
            <img src="images/service4.jpg" alt="" style="width: 300px; height: 300px; ">
            <div class="content">
               <h3>graduation party</h3>
               <p>Excited for the graduation party? We have the best chef and singer to make a memorable night..</p>
               <a href="about.php" class="btn">about us</a>
            </div>
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
   var homeSwiper = new Swiper('.home-slider', {
      loop: true,
      autoplay: {
         delay: 5000,
      },
      pagination: {
         el: '.swiper-pagination',
         clickable: true,
      },
   });

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