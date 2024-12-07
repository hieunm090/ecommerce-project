<?php include('layouts/header.php');?>

<!-- Trang Chủ -->
<section id="home">
    <div class="container">
        <h5>SẢN PHẨM MỚI</h5>
        <h1><span>Giá Tốt Nhất</span> Mùa Này</h1>
        <p>Eshop mang đến những sản phẩm chất lượng với mức giá hợp lý nhất.</p>
        <button>Mua Ngay</button>
    </div>
</section>

<!-- Thương Hiệu -->
<section id="brand" class="container">
    <div class="row">
        <img src="assets/imgs/brand1.jpeg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        <img src="assets/imgs/brand2.jpeg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        <img src="assets/imgs/brand3.jpeg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        <img src="assets/imgs/brand4.jpeg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
    </div>
</section>

<!-- Sản Phẩm Mới -->
<section id="new" class="w-100">
    <div class="row p-0 m-0">
        <!-- Một -->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="assets/imgs/1.jpeg" alt="" class="img-fluid">
            <div class="details">
                <h2>Giày Cực Chất</h2>
                <button class="text-uppercase">Mua Ngay</button>
            </div>
        </div>
        <!-- Hai -->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="assets/imgs/2.jpeg" alt="" class="img-fluid">
            <div class="details">
                <h2>Túi Xách Siêu Đỉnh</h2>
                <button class="text-uppercase">Mua Ngay</button>
            </div>
        </div>
        <!-- Ba -->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="assets/imgs/3.jpeg" alt="" class="img-fluid">
            <div class="details">
                <h2>Giảm Giá 50% Đồng Hồ</h2>
                <button class="text-uppercase">Mua Ngay</button>
            </div>
        </div>
    </div>
</section>

<!-- Sản Phẩm Nổi Bật -->
<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Sản Phẩm Nổi Bật</h3>
        <hr class="mx-auto">
        <p>Khám phá những sản phẩm đặc biệt từ Eshop</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php include('server/get_featured_products.php'); ?>
        <?php while($row= $featured_products->fetch_assoc()) { ?>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?> VNĐ</h4>
            <a href="<?= "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
        </div>
        <?php } ?>
    </div>
</section>

<!-- Khuyến Mãi -->
<section id="banner" class="my-5 py-5">
    <div class="container">
        <h4>GIẢM GIÁ MÙA GIỮA NĂM</h4>
        <h1>Bộ Sưu Tập Thu<br>GIẢM TỚI 30%</h1>
        <button class="text-uppercase">Mua Ngay</button>
    </div>
</section>

<!-- Áo Và Áo Khoác -->
<section id="clothes" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Áo Và Áo Khoác</h3>
        <hr class="mx-auto">
        <p>Khám phá những mẫu áo và áo khoác tuyệt vời của chúng tôi</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php include('server/get_coats.php'); ?>
        <?php while($row= $coats_products->fetch_assoc()) { ?>
        <div onclick="window.location.href='single_product.php?product_id=<?=$row['product_id'];?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?= $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?> VNĐ</h4>
            <a href="<?= "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
        </div>
        <?php } ?>
    </div>
</section>

<!-- Đồng Hồ -->
<section id="watches" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Đồng Hồ Tốt Nhất</h3>
        <hr class="mx-auto">
        <p>Khám phá các mẫu đồng hồ độc đáo của chúng tôi</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php include('server/get_watches.php'); ?>
        <?php while($row= $watches_produts->fetch_assoc()) { ?>
        <div onclick="window.location.href='single_product.php?product_id=<?=$row['product_id'];?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?= $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?> VNĐ</h4>
            <a href="<?= "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
        </div>
        <?php } ?>
    </div>
</section>

<!-- Giày -->
<section id="shoes" class="my-5">
    <div class="container text-center mt-5 py-5">
        <h3>Giày</h3>
        <hr class="mx-auto">
        <p>Khám phá những đôi giày tuyệt vời của chúng tôi</p>
    </div>
    <div class="row mx-auto container-fluid">
        <?php include('server/get_shoes.php'); ?>
        <?php while($row= $shoes_produts->fetch_assoc()) { ?> 
        <div onclick="window.location.href='single_product.php?product_id=<?=$row['product_id'];?>';" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img src="assets/imgs/<?php echo $row['product_image']; ?>" class="img-fluid mb-3">
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?= $row['product_name']; ?></h5>
            <h4 class="p-price"><?php echo $row['product_price']; ?> VNĐ</h4>
            <a href="<?= "single_product.php?product_id=".$row['product_id']; ?>"><button class="buy-btn">Mua Ngay</button></a>
        </div>
        <?php } ?>
    </div>
</section>

<?php include('layouts/footer.php');?>
