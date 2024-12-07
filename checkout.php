<?php include('layouts/header.php');?><
    
?php 
    // session_start();

    if (!empty($_SESSION['cart'])) {
       
         //cho phép user vào thanh toán



    }
    else{ //nếu giỏ hàng rỗng, chuyển hướng về trang chủ
        header('location:index.php');
    }


?>






    <!-- Thanh toán -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Thanh toán</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="checkout-form" action="server/place_order.php" method="POST">
                <p class="text-center" style="color: red;">
                <?php if (isset($_GET['message'])) {echo $_GET['message'];}?>
                <?php if(isset($_GET['message'])) {?>

                    <a class="btn btn-primary" href="login.php">Đăng nhập</a>

                    <?php }?>
            
            
                </p>
                <div class="form-group checkout-small-element">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" placeholder="Name" id="checkout-name" name="name" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="checkout-email" name="email" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Số Điện Thoai</label>
                    <input type="tel" class="form-control" placeholder="Phone" id="checkout-phone" name="phone" required>
                </div>
                <div class="form-group checkout-small-element">
                    <label for="">Thành Phố</label>
                    <input type="text" class="form-control" placeholder="City" id="checkout-city" name="city" required>
                </div>
                <div class="form-group checkout-large-element">
                    <label for="">Địa Chỉ</label>
                    <input type="text" class="form-control" placeholder="Address" id="checkout-address" name="address" required>
                </div>
                <div class="form-group checkout-btn-container">
                    <p>Tổng số tiền : $ <?php echo $_SESSION['total'];?></p>
                    <input type="submit" class="btn" id="checkout-btn" value="Đặt Hàng" name="place_order">
                </div>
            </form>
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


    <?php include('layouts/footer.php');?>