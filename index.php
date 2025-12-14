<?php
require_once 'db/config.php';
require_once 'includes/functions.php';

// Get featured products
$featured_products = get_featured_products(8);

// Get all categories
$categories = get_all_categories();

// Get Men/Women products (optional if showing product cards later)
$men_products = get_products_by_category('Men');
$women_products = get_products_by_category('Women');

// Get banners
$banners_query = "SELECT * FROM banners WHERE status = 'active' ORDER BY display_order LIMIT 3";
$banners = mysqli_query($conn, $banners_query);

include 'includes/header.php';
?>

<!-- Landing Split Banner (Weekday Style) -->
<div class="landing-split">
    <a class="split-link men">
        <div class="overlay">
           <button class="btn-shop">Shop Men</button>
        </div>
    </a>
    <a  class="split-link women">
        <div class="overlay">
            <button class="btn-shop">Shop Women</button>
        </div>
    </a>
</div>

<!-- Carousel/Banners Section -->
<div id="heroCarousel" class="carousel slide my-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php
        mysqli_data_seek($banners, 0);
        $active_index = 0;
        while (mysqli_fetch_assoc($banners)) {
            $active = ($active_index === 0) ? 'active' : '';
            echo '<button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="' . $active_index . '" class="' . $active . '"></button>';
            $active_index++;
        }
        ?>
    </div>
    <div class="carousel-inner">
        <?php
        mysqli_data_seek($banners, 0);
        $is_first = true;
        while ($banner = mysqli_fetch_assoc($banners)):
        ?>
        <div class="carousel-item <?php echo $is_first ? 'active' : ''; ?>">
            <img src="<?php echo UPLOAD_URL . $banner['image']; ?>" class="d-block w-100" alt="<?php echo htmlspecialchars($banner['title']); ?>">
        </div>
        <?php
        $is_first = false;
        endwhile;
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>



<?php include 'includes/footer.php'; ?>
