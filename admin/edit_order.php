<?php include('header.php'); ?>

<?php
// Kiểm tra và xử lý order_id từ URL
if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']); // Chuyển đổi thành số nguyên để tránh lỗi bảo mật
    $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id = ?");
    $stmt->bind_param('i', $order_id);
    $stmt->execute();
    $order = $stmt->get_result(); // Lấy dữ liệu đơn hàng
} elseif (isset($_POST['edit_order'])) { // Cập nhật trạng thái đơn hàng (POST)
    $order_status = $_POST['order_status'];
    $order_id = intval($_POST['order_id']);

    $stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE order_id = ?");
    $stmt->bind_param('si', $order_status, $order_id);

    if ($stmt->execute()) {
        header('location: index.php?order_updated=Đơn hàng được cập nhật thành công');
    } else {
        header('location: index.php?order_failed=Lỗi xảy ra, vui lòng thử lại');
    }
    exit();
} else {
    header('location: index.php');
    exit();
}
?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px">
    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Sửa đơn hàng</h1>
      </div>

      <div class="table-responsive">
        <div class="mx-auto container">
          <form id="edit-order-form" method="POST" action="edit_order.php">
            <?php if ($order && $order->num_rows > 0): ?>
              <?php $r = $order->fetch_assoc(); ?>

              <!-- Hiển thị thông báo lỗi -->
              <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                  <?= htmlspecialchars($_GET['error']); ?>
                </div>
              <?php endif; ?>

              <!-- Order ID -->
              <div class="form-group my-3">
                <label>Order ID</label>
                <p class="my-4"><?= htmlspecialchars($r['order_id']); ?></p>
              </div>

              <!-- Giá đơn hàng -->
              <div class="form-group mt-3">
                <label>Giá Đơn Hàng</label>
                <p class="my-4"><?= htmlspecialchars($r['order_cost']); ?> VND</p>
              </div>

              <!-- Hidden input cho order_id -->
              <input type="hidden" name="order_id" value="<?= htmlspecialchars($r['order_id']); ?>" />

              <!-- Trạng thái đơn hàng -->
              <div class="form-group my-3">
                <label>Trạng thái đơn hàng</label>
                <select class="form-select" name="order_status" required>
                  <option value="chưa thanh toán" <?= $r['order_status'] == 'chưa thanh toán' ? 'selected' : ''; ?>>Chưa Thanh Toán</option>
                  <option value="đã thanh toán" <?= $r['order_status'] == 'đã thanh toán' ? 'selected' : ''; ?>>Đã Thanh Toán</option>
                  <option value="đã vận chuyển" <?= $r['order_status'] == 'đã vận chuyển' ? 'selected' : ''; ?>>Đã Vận Chuyển</option>
                  <option value="đã giao hàng" <?= $r['order_status'] == 'đã giao hàng' ? 'selected' : ''; ?>>Đã Giao Hàng</option>
                </select>
              </div>

              <!-- Ngày đặt hàng -->
              <div class="form-group my-3">
                <label>Ngày Đặt Hàng</label>
                <p class="my-4"><?= htmlspecialchars($r['order_date']); ?></p>
              </div>

              <!-- Nút gửi form -->
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary" name="edit_order">Cập Nhật Đơn Hàng</button>
              </div>

            <?php else: ?>
              <div class="alert alert-danger">
                Không tìm thấy đơn hàng.
              </div>
            <?php endif; ?>
          </form>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>
