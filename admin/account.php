<?php include('header.php'); ?>

<?php 
    // Kiểm tra trạng thái đăng nhập
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
        <h1 class="h2">Quản lý tài khoản Admin</h1>
      </div>

      <div class="container mt-4">
        <!-- Card hiển thị thông tin admin -->
        <div class="card">
          <div class="card-header bg-primary text-white">
            <h5>Thông tin tài khoản</h5>
          </div>
          <div class="card-body">
            <p><strong>ID Admin:</strong> <?= htmlspecialchars($_SESSION['admin_id']); ?></p>
            <p><strong>Tên:</strong> <?= htmlspecialchars($_SESSION['admin_name']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($_SESSION['admin_email']); ?></p>
          </div>
          <div class="card-footer text-muted">
            Ngày đăng nhập cuối: <?= date("Y-m-d H:i:s"); // Ví dụ về ngày giờ ?>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>
