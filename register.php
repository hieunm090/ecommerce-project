<?php include('layouts/header.php');?>

<?php 

    

    include('server/connection.php');

     //if user has already register, then take user to account page 
     if(isset($_SESSION['logged_in'])){

        header('location:account.php');
        exit;
    }

    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        //if password dont match
        if ($password !== $confirmPassword) {
            header('location:register.php?error=mật khẩu không khớp');
        }

        //if password less than 6 character
        else if (strlen($password) < 6) {
            header('location:register.php?error=mật khẩu phải lớn hơn 6 ký tự');
        }

        // if there is no error
        else {

            //check whether there is a user with this email or not
            $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
            $stmt1->bind_param('s',$email);
            $stmt1->execute();
            $stmt1->bind_result($num_rows);
            $stmt1->store_result();
            $stmt1->fetch();

            // if there is a user already register with this email
            if ($num_rows != 0) {
                header('location:register.php?error=người dùng với email đã tồn tại');
            }
            else {// if no user register with this email before

                 //create new user
                $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                                            VALUE (?,?,?);");
                $stmt->bind_param('sss',$name,$email,md5($password));


                //if account was created successfully
                if($stmt->execute()){

                    $user_id = $stmt->insert_id;
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['user_email'] = $email;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['logged_in'] = true;
                    header('location:account.php?register_success=Đăng ký thành công');
                }
                else{//account could not be created
                    header('location:register.php?error=không thể tạo tài khoàn bây giờ');
                }
            }

        }

    }
   
    
?>




    <!-- Register -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Đăng ký</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container">
            <form id="register-form" method="POST" action="register.php">

            <p style="color: red;"><?php if(isset($_GET['error'])) {echo $_GET['error'];}?></p>

                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" class="form-control" placeholder="Name" id="register-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" placeholder="Email" id="register-email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Password" id="register-password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="">Xác nhận mật khẩu</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" id="register-confirm-password" name="confirmPassword" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn" name="register" id="register-btn" value="Register">
                </div>
                <div class="form-group">
                    <a href="login.php" id="login-url" class="btn">Bạn có tài khoản không? Đăng nhập.</a>
                </div>
            </form>
        </div>
    </section>


    <?php include('layouts/footer.php');?>