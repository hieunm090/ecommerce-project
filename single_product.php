
<?php include('layouts/header.php');?>
<?php 
    include('server/connection.php');
    if (isset($_GET['product_id'])) {

        $product_id = $_GET['product_id'];
        $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ? LIMIT 1");
        $stmt->bind_param("i",$product_id);

        $stmt->execute();
    
        $product = $stmt->get_result(); // return array []
       
    }
    else{ // 
        header('location:index.php');
    }

?>



    <!-- Single product -->
    <section class="container single-product my-5 pt-5">
        <div class="row mt-5">

            <?php while($row = $product->fetch_assoc()) {?>


                <div class="col-lg-5 col-md-6 col-sm-12">
                    <img src="assets/imgs/<?= $row['product_image'];?>" class="img-fluid w-100 pb-1" id="mainImg">
                    <div class="small-img-group">
                        <div class="small-img-col">
                            <img src="assets/imgs/<?= $row['product_image'];?>" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="assets/imgs/<?= $row['product_image'];?>" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="assets/imgs/<?= $row['product_image'];?>" width="100%" class="small-img">
                        </div>
                        <div class="small-img-col">
                            <img src="assets/imgs/<?= $row['product_image'];?>" width="100%" class="small-img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h6><?php echo $row['product_category'];?></h6>
                    <h3 class="py-4"><?php echo $row['product_name'];?></h3>
                    <h2 class="price"><?php echo $row['product_price'];?>₫</h2>

        <form action="cart.php" method="POST"> 
            <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
            <input type="hidden" name="product_image" value="<?php echo $row['product_image'];?>">
            <input type="hidden" name="product_name" value="<?php echo $row['product_name'];?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price'];?>">
            <input type="number" name="product_quantity" value="1">
            <button class="buy-btn" type="submit" name="add_to_cart">Thêm vào giỏ hàng</button>
    </form>

    <h4 class="mt-5 mb-5">Chi tiết sản phẩm</h4>
    <span><?= $row['product_description'];?></span>
</div>

           
             <?php }?>

        </div>

    </section>



    <!-- Related products -->
    <section id="related-products" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Sản phẩm liên quan</h3>
            <hr class="mx-auto">
        </div>
        <div class="row mx-auto container-fluid">
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/featured1.jpeg" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Giày thể thao</h5>
                <h4 class="p-price">$199.80</h4>
                <button class="buy-btn">Mua ngay</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/featured2.jpeg" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Giày thể thao</h5>
                <h4 class="p-price">$199.80</h4>
                <button class="buy-btn">Mua ngay</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/featured3.jpeg" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Giày thể thao</h5>
                <h4 class="p-price">$199.80</h4>
                <button class="buy-btn">Mua ngay</button>
            </div>
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img src="assets/imgs/featured4.jpeg" class="img-fluid mb-3">
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">Giày thể thao</h5>
                <h4 class="p-price">$199.80</h4>
                <button class="buy-btn">Mua ngay</button>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="mt-5 py-5">
        <div class="row container mx-auto my-5">
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <img src="assets/imgs/logo.jpeg" alt="" class="logo">
                <p class="pt-3">Chúng tôi cung cấp những sản phẩm tốt nhất với giá cả phải chăng nhất.</p>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Nổi bật</h5>
                <ul class="text-uppercase">
                    <li><a href="#">Nam</a></li>
                    <li><a href="#">Nữ</a></li>
                    <li><a href="#">Con trai</a></li>
                    <li><a href="#">Con gái</a></li>
                    <li><a href="#">Sản phẩm mới</a></li>
                    <li><a href="#">Quần áo</a></li>
                </ul>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Liên Hệ Với Chúng Tôi</h5>
                <div>
                    <h6 class="text-uppercase">Address</h6>
                    <p>52/236 , Trần Phú, Mộ Lao, Hà Đông, Hà Nội, 18000</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Phone</h6>
                    <p>085-6298734</p>
                </div>
                <div>
                    <h6 class="text-uppercase">Email</h6>
                    <p>hieunm090@gmail.com</p>
                </div>
            </div>
            <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                <h5 class="pb-2">Facebook</h5>
                <div class="row">
                    <img src="assets/imgs/featured1.jpeg" alt="" class="img-fluid w-25 h-100 m-2">
                    <img src="assets/imgs/featured2.jpeg" alt="" class="img-fluid w-25 h-100 m-2">
                    <img src="assets/imgs/featured3.jpeg" alt="" class="img-fluid w-25 h-100 m-2">
                    <img src="assets/imgs/featured4.jpeg" alt="" class="img-fluid w-25 h-100 m-2">
                    <img src="assets/imgs/featured5.jpeg" alt="" class="img-fluid w-25 h-100 m-2">
                </div>
            </div>
        </div>


        <div class="copyright mt-5">
            <div class="row container mx-auto">
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <img src="assets/imgs/payment.jpeg" alt="">
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                    <p>Thương mại điện tử @ 2025 Bảo lưu tất cả quyền.</p>
                </div>
                <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </footer>
        <script>
            let mainImg = document.getElementById('mainImg');
            let smallImg = document.getElementsByClassName('small-img'); //[0 , 1, 2, 3]
            // console.log(smallImg[0]);

            // smallImg.onclick = function() {
            //     mainImg.src = smallImg[0].src;
            // }

            for (let i = 0; i < smallImg.length; i++) {
                smallImg[i].addEventListener('click', () => {
                    mainImg.src = smallImg[i].src;
                });

            }
        </script>




 <?php include('layouts/footer.php');?>