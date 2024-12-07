<?php include('layouts/header.php');?>



<?php 

    

    include('server/connection.php');

    if (isset($_SESSION['logged_in'])) {
        header('location:account.php');
        exit;
    }

    if (isset($_POST['login_btn'])) {

        $email = $_POST['email'];
        $password = md5($_POST['password']);
        //sqli sql-> trc tham so->sau
        $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1"); //prepare statement block sqli
        $stmt->bind_param('ss',$email, $password);

        if($stmt->execute()){
            $stmt->bind_result($user_id,$user_name,$user_email,$user_password);

            $stmt->store_result();
            if ($stmt->num_rows() == 1) {
                $stmt->fetch();
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['logged_in'] = true;

                header('location:account.php?login_success=Đăng nhập thành công');
            }
            else{
                header('location:login.php?error=không thể xác minh tài khoản');
            }

        }
        else{//error
            header('location:login.php?error=đã xảy ra lỗi');
        }
       
    }



?>



    <!-- Login -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Đăng Nhập</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="login-form" action="login.php" method="POST">
                <p style="color: red;" class="text-center"><?php if(isset( $_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="login-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Mật Khẩu</label>
                    <input type="password" class="form-control" placeholder="Password" id="login-password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" value="Login" name="login_btn">
                </div>
                <div class="form-group">
                    <a href="register.php" id="register-url" class="btn">Chưa có tài khoản, đăng kí</a>
                </div>
            </form>
        </div>
    </section>



    <?php include('layouts/footer.php');?>