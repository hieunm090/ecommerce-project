<?php include('header.php');?>




<div class="container-fluid">
  <div class="row"  style="min-height: 1000px">
  <?php include('sidemenu.php');?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng điều khiển</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          
          </div>
     
        </div>
      </div>

    

      <h2>Tạo Sản Phẩm</h2>
      <div class="table-responsive">
      


          <div class="mx-auto container">
              <form id="create-form"  enctype="multipart/form-data" method="POST" action="create_product.php">
                <p style="color: red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
                <div class="form-group mt-2">
                    <label>Tiêu Đề</label>
                    <input type="text" class="form-control" id="product-name" name="name" placeholder="Tiêu đề" required/>
                </div>
                  <div class="form-group mt-2">
                      <label>Mô Tả</label>
                      <input type="text" class="form-control" id="product-desc" name="description" placeholder="Mô tả" required/>
                  </div>
                  <div class="form-group mt-2">
                    <label>Giá Cả</label>
                    <input type="number" class="form-control" id="product-price" name="price" placeholder="Giá cả" required/>
                </div>
                 <div class="form-group mt-2">
                    <label>Giảm Giá Đặc Biệt</label>
                    <input type="number" class="form-control" id="product-offer" name="offer" placeholder="Sale %" required/>
                </div>



                <div class="form-group mt-2">
                    <label>Danh Mục</label>
                    <select  class="form-select" required name="category">
                        <option value="bags">Túi</option>
                        <option value="shoes">Giày</option>
                        <option value="watches">Đồng Hồ</option>
                        <option value="clothes">Quần áo</option>
                    </select>
                </div>


                <div class="form-group mt-2">
                      <label>Màu sắc</label>
                      <input type="text" class="form-control" id="product-color" name="color" placeholder="Màu" required/>
                  </div>

                <div class="form-group mt-2">
                    <label>Ảnh 1</label>
                    <input type="file" class="form-control" id="image1" name="image1" placeholder="Ảnh 1" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Ảnh 2</label>
                    <input type="file" class="form-control" id="image2" name="image2" placeholder="Ảnh 2" required/>
                </div>

                <div class="form-group mt-2">
                    <label>Ảnh 3</label>
                    <input type="file" class="form-control" id="image3" name="image3" placeholder="Ảnh 3" required/>
                </div>

                  <div class="form-group mt-2">
                    <label>Ảnh 4</label>
                    <input type="file" class="form-control" id="image4" name="image4" placeholder="Ảnh 4" required/>
                </div>
          

                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" name="create_product" value="Tạo"/>
                </div>
 
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
