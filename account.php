<?php include('layouts/header.php');?>

<?php
    // session_start();

    include('server/connection.php');


    if(!isset($_SESSION['logged_in'])){
        header('location:login.php');
        exit;
    }
//đăng xuất user
    if (isset($_GET['logout'])) {
        
        if (isset($_SESSION['logged_in'])) {
            unset($_SESSION['logged_in']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);

            header('location:login.php');
            exit;
        }
    }
//thay đổi mk
    if(isset($_POST['change_password'])){

        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $user_email = $_SESSION['user_email'];

        //if passwords dont match
        if($password !== $confirmPassword){
          header('location: account.php?error=mật khẩu không khớp');
        

        //if passwod is less than 6 char
        }else if(strlen($password) < 6){
          header('location: account.php?error=mật khẩu phải ít nhất 6 ký tự');

          //no errors
        }else{
           
          $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
          $stmt->bind_param('ss',md5($password),$user_email); 

          if($stmt->execute()){
            header('location: account.php?message=mật khẩu được cập nhật thành công');
          }else{
            header('location: account.php?error=không thể cập nhật mật khẩu');
          }
          
        }


    }

    // lấy thông tin đơn hàng
    if (isset($_SESSION['logged_in'])) {

        $user_id = $_SESSION['user_id'];
        $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id =? ");
        $stmt->bind_param('i',$user_id);

        $stmt->execute();

        $orders = $stmt->get_result(); // return array []
    }






?>




    <!-- Account -->
    <section class="my-5 py-5">
        <div class="row container mx-auto">

        <?php if(isset($_GET['payment_message'])){?>

            <p class="text-center" style="color:green"><?php  echo $_GET['payment_message']; ?></p>

        <?php } ?>
            
            
            <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
                <p class="text-center" style="color:green"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; }?></p>
                <p class="text-center" style="color:green"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }?></p>
                <h3 class="font-weight-bold">Thông tin tài khoản</h3>
                <hr class="mx-auto">
                <div class="account-info">
                    <p>Tên <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];} ?></span></p>
                    <p>Email <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?></span></p>
                    <p><a href="#orders" id="order-btn">Đơn đặt hàng của bạn</a></p>
                    <p><a href="account.php?logout=1" id="logout-btn">Đăng xuất</a></p>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form action="account.php" id="account-form" method="POST">
                    <p class="text-center" style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                    <p class="text-center" style="color:green"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
                    <h3>Đổi mật khẩu</h3>
                    <hr class="mx-auto">
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" class="form-control" id="account-password" placeholder="mật khẩu" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="">Xác nhận mật khẩu</label>
                        <input type="password" class="form-control" id="account-password-confirm" placeholder="xác nhận mật khẩu" name="confirmPassword" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Đổi mật khẩu" class="btn" id="change-pass-btn" name="change_password">
                    </div>

                </form>
            </div>
        </div>
    </section>


    <!-- Orders -->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bolder text-center">Đơn đặt hàng của bạn</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Chi phí đơn hàng</th>
                <th>Trạng thái đơn hàng</th>
                 <th>Ngày đặt hàng</th>
                <th>Chi tiết đơn hàng</th>
            </tr>

            <?php while($row = $orders->fetch_assoc()) {?>

                    <tr>
                        <td>
                            <!-- <div class="product-info">
                                <img src="assets/imgs/featured1.jpeg" alt="">
                                <div>
                                    <p class="mt-3"><?php echo $row['order_id'];?></p>
                                </div>
                            </div> -->
                            <span><?php echo $row['order_id'];?></span>
                        </td>

                        <td>
                            <span><?php echo $row['order_cost'];?></span>
                        </td>

                        <td>
                            <span><?php echo $row['order_status'];?></span>
                        </td>


                        <td>
                            <span><?php echo $row['order_date'];?></span>
                        </td>

                        <td>
                        <form action="order_details.php" method="POST">
                                <input type="hidden" value="<?=$row['order_status'];?>" name="order_status"> 
                                <input type="hidden" value="<?=$row['order_id'];?>" name="order_id">
                                <input type="submit" class="btn order-details-btn" value="chi tiết" name="order_details_btn">
                            </form>
                        </td>

                    </tr>

            <?php }?>

        </table>


    </section>



    <?php include('layouts/footer.php');?>