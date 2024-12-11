<?php include('header.php'); ?>

<?php 
    // Kiểm tra đăng nhập
    if(!isset($_SESSION['admin_logged_in'])){
        header('location: login.php');
        exit();
    }
?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px">
    <!-- Sidebar -->
    <?php include('sidemenu.php'); ?>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Giúp đỡ</h1>
      </div>

      <div class="container mt-3">
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5>Liên hệ hỗ trợ</h5>
          </div>
          <div class="card-body">
            <p>Nếu bạn gặp vấn đề hoặc cần hỗ trợ, vui lòng liên hệ qua:</p>
            <ul class="list-group">
              <li class="list-group-item">
                <strong>Email:</strong> 
                <a href="mailto:hieunm090@email.com">hieunm090@email.com</a>
              </li>
              <li class="list-group-item">
                <strong>Số điện thoại:</strong> 
                <a href="tel:0856298743">0856298743</a>
              </li>
            </ul>
          </div>
          <div class="card-footer text-muted">
            Cảm ơn bạn đã sử dụng hệ thống của chúng tôi!
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
