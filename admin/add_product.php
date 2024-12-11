<?php include('header.php'); ?>

<div class="container-fluid">
  <div class="row" style="min-height: 1000px">
    <?php include('sidemenu.php'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bảng điều khiển</h1>
      </div>

      <h2>Tạo Sản Phẩm</h2>
      <div class="table-responsive">
        <div class="mx-auto container">
          <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
            <p style="color: red;"><?php if (isset($_SESSION['error'])) { echo $_SESSION['error']; unset($_SESSION['error']); } ?></p>
            
            <!-- Tiêu đề -->
            <div class="form-group mt-2">
              <label for="product-name">Tiêu Đề</label>
              <input type="text" class="form-control" id="product-name" name="name" placeholder="Tiêu đề" required autocomplete="off" />
            </div>

            <!-- Mô tả -->
            <div class="form-group mt-2">
              <label for="product-desc">Mô Tả</label>
              <input type="text" class="form-control" id="product-desc" name="description" placeholder="Mô tả" required autocomplete="off" />
            </div>

            <!-- Giá cả -->
            <div class="form-group mt-2">
              <label for="product-price">Giá Cả</label>
              <input type="number" class="form-control" id="product-price" name="price" placeholder="Giá cả" required />
            </div>

            <!-- Giảm giá đặc biệt -->
            <div class="form-group mt-2">
              <label for="product-offer">Giảm Giá Đặc Biệt</label>
              <input type="number" class="form-control" id="product-offer" name="offer" placeholder="Sale %" required />
            </div>

            <!-- Danh mục -->
            <div class="form-group mt-2">
              <label for="category">Danh Mục</label>
              <select class="form-select" id="category" name="category" required>
                <option value="túi">Túi</option>
                <option value="giày">Giày</option>
                <option value="đồng hồ">Đồng Hồ</option>
                <option value="quần áo">Quần áo</option>
              </select>
            </div>

            <!-- Màu sắc -->
            <div class="form-group mt-2">
              <label for="product-color">Màu sắc</label>
              <input type="text" class="form-control" id="product-color" name="color" placeholder="Màu" required />
            </div>

            <!-- Ảnh 1 -->
            <div class="form-group mt-2">
              <label for="image1">Ảnh 1</label>
              <input type="file" class="form-control" id="image1" name="image1" required />
            </div>

            <!-- Ảnh 2 -->
            <div class="form-group mt-2">
              <label for="image2">Ảnh 2</label>
              <input type="file" class="form-control" id="image2" name="image2" required />
            </div>

            <!-- Ảnh 3 -->
            <div class="form-group mt-2">
              <label for="image3">Ảnh 3</label>
              <input type="file" class="form-control" id="image3" name="image3" required />
            </div>

            <!-- Ảnh 4 -->
            <div class="form-group mt-2">
              <label for="image4">Ảnh 4</label>
              <input type="file" class="form-control" id="image4" name="image4" required />
            </div>

            <!-- Nút gửi form -->
            <div class="form-group mt-3">
              <input type="submit" class="btn btn-primary" name="create_product" value="Tạo" />
            </div>
          </form>
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
