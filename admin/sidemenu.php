<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column" aria-label="Sidebar Navigation">
      <!-- Mục Bảng điều khiển -->
      <li class="nav-item">
        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : '' ?>" href="index.php" data-bs-toggle="tooltip" title="Quản lý tổng quan">
          <span data-feather="home"></span> Bảng điều khiển
        </a>
      </li>

      <!-- Mục Đơn hàng -->
      <li class="nav-item">
        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'edit_order.php' ? 'active' : '' ?>" href="edit_order.php" data-bs-toggle="tooltip" title="Xem và quản lý đơn hàng">
          <span data-feather="file"></span> Đơn hàng
        </a>
      </li>

      <!-- Mục Sản phẩm -->
      <li class="nav-item">
        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : '' ?>" href="products.php" data-bs-toggle="tooltip" title="Xem và quản lý sản phẩm">
          <span data-feather="shopping-cart"></span> Sản phẩm
        </a>
      </li>

      <!-- Mục Tài khoản -->
      <li class="nav-item">
        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'account.php' ? 'active' : '' ?>" href="account.php" data-bs-toggle="tooltip" title="Quản lý tài khoản người dùng">
          <span data-feather="bar-chart-2"></span> Tài khoản
        </a>
      </li>

      <!-- Mục Thêm sản phẩm -->
      <li class="nav-item">
        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'add_product.php' ? 'active' : '' ?>" href="add_product.php" data-bs-toggle="tooltip" title="Thêm mới sản phẩm vào hệ thống">
          <span data-feather="plus-circle"></span> Thêm mới sản phẩm
        </a>
      </li>

      <!-- Phân cách -->
      <hr class="my-2">

      <!-- Mục Giúp đỡ -->
      <li class="nav-item">
        <a class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'help.php' ? 'active' : '' ?>" href="help.php" data-bs-toggle="tooltip" title="Xem tài liệu hoặc liên hệ hỗ trợ">
          <span data-feather="help-circle"></span> Giúp đỡ
        </a>
      </li>
    </ul>
  </div>
</nav>

<script>
  // Kích hoạt tooltip của Bootstrap
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
