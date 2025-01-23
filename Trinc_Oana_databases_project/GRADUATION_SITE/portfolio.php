<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>portfolio</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">

   <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

<?php @include 'header.php'; ?>

<section class="portfolio">

   <h1 class="heading">our work</h1>

   <div class="portfolio-container">

       <a href="images/gallery1.jpg" class="box">

         <div class="image">
            <img src="images/gallery1.jpg" alt="">
	 </div>
	

        </a>

    <a href="images/gallery2.jpg" class="box">

         <div class="image">
            <img src="images/gallery2.jpg" alt="">
	 </div>


	</a>	         

      <a href="images/gallery3.jpg" class="box">
         <div class="image">
            <img src="images/gallery3.jpg" alt="">
         </div>
         
      </a>

      <a href="images/gallery4.jpg" class="box">
         <div class="image">
            <img src="images/gallery4.jpg" alt="">
         </div>
         
      </a>

      <a href="images/gallery5.jpg" class="box">
         <div class="image">
            <img src="images/gallery5.jpg" alt="">
         </div>
        
      </a>

      <a href="images/gallery6.jpg" class="box">
         <div class="image">
	    <img src="images/gallery6.jpg" alt="">
         </div>
         
      </a>

 <a href="images/gallery7.jpg" class="box">
         <div class="image">
            <img src="images/gallery7.jpg" alt=""> 
         </div>
         
      </a>

 <a href="images/gallery8.jpg" class="box">
         <div class="image">
            <img src="images/gallery8.jpg" alt=""> 
         </div>
         
      </a>

 <a href="images/gallery9.jpg" class="box">
         <div class="image">
            <img src="images/gallery9.jpg" alt=""> 
         </div>
         
      </a>

<a href="images/gallery10.jpg" class="box">
         <div class="image">
            <img src="images/gallery10.jpg" alt=""> 
         </div>
        
      </a>

 <a href="images/gallery11.jpg" class="box">
         <div class="image">
            <img src="images/gallery11.jpg" alt=""> 
         </div>
      </a>

 <a href="images/gallery12.jpg" class="box">
         <div class="image">
            <img src="images/gallery12.jpg" alt=""> 
         </div>

      </a>

<a href="images/gallery13.jpg" class="box">

         <div class="image">
            <img src="images/gallery13.jpg" alt="">
         </div>


        </a>

    <a href="images/gallery14.jpg" class="box">

         <div class="image">
            <img src="images/gallery14.jpg" alt="">
         </div>


        </a>

      <a href="images/gallery15.jpg" class="box">
         <div class="image">
            <img src="images/gallery15.jpg" alt="">
         </div>

      </a>

<a href="images/gallery16.jpg" class="box">

         <div class="image">
            <img src="images/gallery16.jpg" alt="">
         </div>


        </a>

    <a href="images/gallery17.jpg" class="box">

         <div class="image">
            <img src="images/gallery17.jpg" alt="">
         </div>


        </a>

      <a href="images/gallery18.jpg" class="box">
         <div class="image">
            <img src="images/gallery18.jpg" alt="">
         </div>

      </a>

<a href="images/gallery19.jpg" class="box">

         <div class="image">
            <img src="images/gallery19.jpg" alt="">
         </div>


        </a>

    <a href="images/gallery20.jpg" class="box">

         <div class="image">
            <img src="images/gallery20.jpg" alt="">
         </div>


        </a>

    <a href="images/gallery21.jpg" class="box">
         <div class="image">
            <img src="images/gallery21.jpg" alt="">
         </div>

      </a>
    <a href="images/gallery22.jpg" class="box">
         <div class="image">
            <img src="images/gallery22.jpg" alt="">
         </div>

      </a>

   </div>

</section>

<?php @include 'footer.php'; ?>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>

<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

   lightGallery(document.querySelector('.portfolio .portfolio-container'));

</script>

</body>
</html>
