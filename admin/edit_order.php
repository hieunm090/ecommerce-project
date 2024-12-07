<?php include('header.php'); ?>



<?php

// Kiểm tra và xử lý order_id từ URL
if(isset($_GET['order_id'])){

  $order_id = $_GET['order_id'];
  $stmt = $conn->prepare("SELECT * FROM orders WHERE order_id=?");
  $stmt->bind_param('i',$order_id);
  $stmt->execute();

  $order = $stmt->get_result(); //[]
//Cập nhập trạng thái đơn hàng (POST)
}  else if(isset($_POST['edit_order'])){

    $order_status = $_POST['order_status'];
    $order_id = $_POST['order_id'];

    $stmt = $conn->prepare("UPDATE orders SET order_status=? WHERE order_id=?");
    $stmt->bind_param('si',$order_status,$order_id);

    if($stmt->execute()){
      header('location: index.php?order_updated=Đơn hàng được cập nhật thành công');
    }else{
    header('location: index.php?order_failed=Lỗi xảy ra, vui lòng thử lại');
    }




}else{

  header('location: index.php');
  exit;
}




?>



<div class="container-fluid">
  <div class="row"  style="min-height: 1000px">

    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng điều khiển</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          
          </div>
     
        </div>
      </div>

    

      <h2>Sửa đơn hàng</h2>
      <div class="table-responsive">
      



          <div class="mx-auto container">
              <form id="edit-order-form"  method="POST" action="edit_order.php">

              <?php foreach($order as $r){?>

                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group my-3">
                    <label>OrderId</label>
                    <p class="my-4"><?php echo $r['order_id'];?></p>
                   
                </div>
                  <div class="form-group mt-3">
                        <label>Giá đơn hàng</label>
                        <p class="my-4"><?php echo $r['order_cost'];?></p>
                    
                  </div>


                  <input type="hidden" name="order_id" value="<?php echo $r['order_id'];?>"/>
         
                <div class="form-group my-3">
                    <label>Trạng thái đơn hàng</label>
                    <select  class="form-select" required name="order_status">
                      
                        <option value="chưa thanh toán" <?php if($r['order_status']=='chưa thanh toán'){ echo "đã chọn";}?> >Chưa Thanh Toán</option>
                        <option value="đã thanh toán" <?php if($r['order_status']=='đã thanh toán'){ echo "đã chọn";}?>>Đã Thanh Toán</option>
                        <option value="đã vận chuyển" <?php if($r['order_status']=='đã vận chuyển'){ echo "đã chọn";}?>>Đã Vận Chuyển</option>
                        <option value="đã giao hàng" <?php if($r['order_status']=='đã giao hàng'){ echo "đã chọn";}?>>Đã Giao Hàng</option>
                    </select>
                </div>
                
                  <div class="form-group my-3">
                         <label>Ngày Đặt Hàng</label>
                    <p class="my-4"><?php echo $r['order_date'];?></p>

                    
                  </div>

            


                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="edit_order" value="Sửa"/>
                </div>
 


                <?php } ?>

              </form>
          </div>
    




      </div>
    </main>
  </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>