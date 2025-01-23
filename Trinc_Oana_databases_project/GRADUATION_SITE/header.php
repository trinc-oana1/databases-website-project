<section class="header">
  <a href="home.php" class="logo">YOURGRADUATION.</a>
  <nav class="navbar">
    <a href="home.php">Home</a>
    <a href="about.php">About</a>
    <a href="portfolio.php">Our work</a>
    <a href="pricing.php">Packages & clients</a>
    <a href="contact.php">Contact</a>
    <a href="cart.php">Shopping cart</a>
    <a href="wishlist.php">Wishlist</a>
    
    <div class="dropdown">
      <a href="shop.php" class="dropbtn">Services</a>
    
    </div>
    <a href="login.php">Logout</a>
    
  </nav>
  <div id="menu-btn" class="fas fa-bars"></div>

  <?php
  // Handle logout
  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
  }
  ?>

</section>

<script src="js/script.js"></script>