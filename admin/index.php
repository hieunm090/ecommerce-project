<?php 
include('header.php');

// Kiểm tra đăng nhập
if (!isset($_SESSION['admin_logged_in'])) {
    header('location: login.php');
    exit;
}

// Xác định số trang
$page_no = isset($_GET['page_no']) && $_GET['page_no'] != "" ? $_GET['page_no'] : 1;

// Trả về tổng số đơn hàng
$stmt1 = $conn->prepare("SELECT COUNT(*) AS total_records FROM orders");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->fetch(); // Lấy kết quả của câu truy vấn
$stmt1->free_result(); // Giải phóng kết quả truy vấn trước khi tiếp tục

// Số đơn hàng mỗi trang
$total_records_per_page = 5;
$offset = ($page_no - 1) * $total_records_per_page;

// Lấy đơn hàng
$stmt2 = $conn->prepare("SELECT * FROM orders LIMIT ?, ?");
$stmt2->bind_param("ii", $offset, $total_records_per_page); // Bảo vệ khỏi SQL Injection
$stmt2->execute();
$orders = $stmt2->get_result(); // Lấy kết quả truy vấn

// Tổng số trang
$total_no_of_pages = ceil($total_records / $total_records_per_page);
?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px">

    <?php include('sidemenu.php');?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng điều khiển</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
        </div>
      </div>

      <h2>Đơn hàng</h2>

      <?php if(isset($_GET['order_updated'])){  ?>
        <p class="text-center" style="color: green;"><?=$_GET['order_updated']?></p>
      <?php }?>

      <?php if(isset($_GET['order_failed'])){  ?>
        <p class="text-center" style="color: red;"><?=$_GET['order_failed']?></p>
      <?php }?>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Mã đơn hàng</th>
              <th scope="col">Trạng thái đơn hàng</th>
              <th scope="col">Mã người dùng</th>
              <th scope="col">Ngày đặt hàng</th>
              <th scope="col">Số điện thoại người dùng</th>
              <th scope="col">Địa chỉ người dùng</th>
              <th scope="col">Chỉnh sửa</th>
              <th scope="col">Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($orders as $order) { ?>
              <tr>
                <td><?=$order['order_id']?></td>
                <td><?=$order['order_status']?></td>
                <td><?=$order['user_id']?></td>
                <td><?=$order['order_date']?></td>
                <td><?=$order['user_phone']?></td>
                <td><?=$order['user_address']?></td>
                <td><a href="edit_order.php?order_id=<?php echo $order['order_id'];?>" class="btn btn-primary">Chỉnh sửa</a></td>
                <td><a href="" class="btn btn-danger">Xóa</a></td>
              </tr>
            <?php } ?>  
          </tbody>
        </table>

        <nav aria-label="Ví dụ về điều hướng trang" class="mx-auto">
          <ul class="pagination mt-5 mx-auto">
            <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">
               <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{ echo "?page_no=".($page_no-1);} ?>">Trước</a>
            </li>

            <!-- Trang số 1 và 2 -->
            <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
            <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

            <!-- Nếu trang hiện tại >= 3, hiển thị "..." -->
            <?php if($page_no >= 3) {?>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no;?></a></li>
            <?php } ?>

            <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
               <a class="page-link" href="<?php if($page_no >= $total_no_of_pages ){echo '#';} else{ echo "?page_no=".($page_no+1);}?>">Tiếp theo</a>
            </li>
          </ul>
        </nav>

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
