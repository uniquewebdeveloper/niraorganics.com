
<?php
session_start(); // Start the session to access the cart
include 'db.php';

// Initialize $cart_count to 0
$cart_count = 0;

// Check if the cart session variable exists and is not empty
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    $cart_count = array_sum($_SESSION['cart']); 
}// Sum up the quantities in the cart
?>  
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"  rel="stylesheet"/>
  <title>Nira Organics</title>
</head>
<body>
  <nav class="navbar">
		<div class="navdiv">
		<div class="logo">
        <img src="images/logo.png" alt="Logo"> <!-- Replace 'logo.png' with the path to your image -->
        
    </div>
			<ul>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<li><a href="index.php">Home</a></li>
				<li><a href="product.php">product</a></li>
				<li><a href="#contact">Contact</a></li>
				<li>  <a href="login.php"> User login</a></li>
               <li> <a  href="admin">Admin login</a></li>
	 
	 <a href="cart.php" class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
        <?php if ($cart_count > 0): ?>
            <span><?php echo $cart_count; ?></span>
        <?php endif; ?>
    </a>
</ul>
	</nav>
	
  
<section id="home">
<img src="images/f3.jpeg" class="img-fluid" alt="Responsive image" width="100%">

</section>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>