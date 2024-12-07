
<?php include('header.php')?>

<?php 
   
          if(!isset($_SESSION['admin_logged_in'])){
                header('location: login.php');
                exit;

          }
          
          //1. xác định số trang
          if(isset($_GET['page_no']) && $_GET['page_no'] != ""){
            $page_no = $_GET['page_no'];
          }else{
            $page_no = 1;
          }



          //2. return number of products 
          $stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
          $stmt1->execute();
          $stmt1->bind_result($total_records);
          $stmt1->store_result();
          $stmt1->fetch();


          //3. products per page
          $total_records_per_page = 5;

          $offset = ($page_no-1) * $total_records_per_page;

          $previous_page = $page_no - 1;
          $next_page = $page_no + 1;

          $adjacents = "2";

          $total_no_of_pages = ceil($total_records/$total_records_per_page);



          //4. get all products

          $stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
          $stmt2->execute();
          $products = $stmt2->get_result();


?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px">



  <?php include('sidemenu.php');?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng Điều Khiển</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          
          </div>
     
        </div>
      </div>

      <h2>Sản Phẩm</h2>

      <?php if(isset($_GET['edit_success_message'])){  ?>
        <p class="text-text-center" style="color: green;"><?=$_GET['edit_success_message']?></p>
      <?php }?>


      <?php if(isset($_GET['edit_failure_message'])){  ?>
        <p class="text-text-center" style="color: red;"><?=$_GET['edit_failure_message']?></p>
      <?php }?>
       

      <?php if(isset($_GET['delete_successfully'])){  ?>
        <p class="text-text-center" style="color: green;"><?=$_GET['delete_successfully']?></p>
      <?php }?>
      

      <?php if(isset($_GET['delete_failure'])){  ?>
        <p class="text-text-center" style="color: red;"><?=$_GET['delete_failure']?></p>
      <?php }?>

      <?php if(isset($_GET['product_created'])){  ?>
        <p class="text-text-center" style="color: green;"><?=$_GET['product_created']?></p>
      <?php }?>
      

      <?php if(isset($_GET['product_failed'])){  ?>
        <p class="text-text-center" style="color: red;"><?=$_GET['product_failed']?></p>
      <?php }?>



      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Id Sản phẩm</th>
              <th scope="col">Hình ảnh Sản phẩm</th>
              <th scope="col">Tên sản phẩm</th>
              <th scope="col">Giá sản phẩm</th>
              <th scope="col">Giảm giá</th>
              <th scope="col">Danh mục sản phẩm</th>
              <th scope="col">Màu sắc sản phẩm</th>
              <th scope="col">Chỉnh sửa hình ảnh</th>
              <th scope="col">Chỉnh sửa</th>
              <th scope="col">Xóa</th>
            </tr>
          </thead>
          <tbody>
           
          <?php foreach($products as $product) {?>

            <tr>
              <td><?=$product['product_id'];?></td>
              <td><img src="<?= "../assets/imgs/".$product['product_image']?>" alt="" width="70px" height="70px"></td>
              <td><?=$product['product_name'];?></td>
              <td><?="$".$product['product_price'];?></td>
              <td><?=$product['product_special_offer']."%";?></td>
              <td><?=$product['product_category'];?></td>
              <td><?=$product['product_color'];?></td>

              <td><a href="<?php echo "edit_images.php?product_id=".$product['product_id']."&product_name=".$product['product_name'];?>" class="btn btn-warning">Chỉnh sửa ảnh</a></td>
              <td><a href="edit_product.php?product_id=<?=$product['product_id'];?>" class="btn btn-primary">Chỉnh sửa</a></td>
              <td><a href="delete_product.php?product_id=<?php echo $product['product_id'];?>" class="btn btn-danger" >Xóa</a></td>
            </tr>


            <?php }?>


          </tbody>
        </table>

        <nav aria-label="Page navigation example" class="mx-auto">
        <ul class="pagination mt-5 mx-auto">
          
          <li class="page-item <?php if($page_no<=1){echo 'disabled';}?> ">
               <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{ echo "?page_no=".($page_no-1);} ?>">Trước</a>
          </li>


          <li class="page-item"><a class="page-link" href="?page_no=1">1</a></li>
          <li class="page-item"><a class="page-link" href="?page_no=2">2</a></li>

          <?php if( $page_no >=3) {?>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"><?php echo $page_no;?></a></li>
          <?php } ?>



          <li class="page-item <?php if($page_no >=  $total_no_of_pages){echo 'disabled';}?>">
                 <a class="page-link" href="<?php if($page_no >= $total_no_of_pages ){echo '#';} else{ echo "?page_no=".($page_no+1);}?>">Tiếp theo</a></li>
         </ul>
      </nav>




      </div>
    </main>
  </div>
          
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>
