<?php
require_once __DIR__ . '/../db/config.php';
require_once __DIR__ . '/functions.php';

$current_page = basename($_SERVER['PHP_SELF']);
$cart_count = get_cart_count();
$wishlist_count = get_wishlist_count();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Clothing Store</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
    <!-- Navigation Bar -->
<nav class="weekday-navbar">
    <div class="container">
        <!-- LEFT: Gender links + Search -->
        <div class="nav-left">
            <ul class="nav-gender">
                <li><a href="<?php echo BASE_URL; ?>customer/index.php?gender=men">Men</a></li>
                <li><a href="<?php echo BASE_URL; ?>customer/index.php?gender=women">Women</a></li>
                <li><a href="<?php echo BASE_URL; ?>customer/index.php?gender=kids">Kids</a></li>
            </ul>
            <form class="nav-search" action="<?php echo BASE_URL; ?>search.php" method="get">
                <input type="text" name="q" placeholder="Search" required>
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        
      <!-- CENTER: Website Name -->
<div class="nav-center">
    <h1 class="site-name">STAPLE</h1> 
</div>


        <!-- RIGHT: Login / Wishlist / Cart -->
        <div class="nav-right">
            <?php if(is_logged_in()): ?>
                <a href="<?php echo BASE_URL; ?>customer/profile.php"><i class="fas fa-user"></i></a>
            <?php else: ?>
                <a href="<?php echo BASE_URL; ?>login.php"><i class="fas fa-user"></i></a>
            <?php endif; ?>
            <a href="<?php echo BASE_URL; ?>customer/wishlist.php"><i class="fas fa-heart"></i></a>
            <a href="<?php echo BASE_URL; ?>customer/cart.php"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </div>
</nav>


     
</nav>


    <!-- Main Content Container -->
    <div class="main-content">
        <?php display_message(); ?>
