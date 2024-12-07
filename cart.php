<?php include('layouts/header.php');?>

<?php 
    
    if (isset($_POST['add_to_cart'])) { //xử lý thêm sp vào gior hàng

        if (isset($_SESSION['cart'])) { // nếu giỏ hàng đã có sản phẩm
            
            $products_array_ids = array_column($_SESSION['cart'],"product_id"); // return all product_id trong giỏ
            
            //if product has already been added to cart or not
            if (!in_array($_POST['product_id'], $products_array_ids)) {

                $product_id = $_POST['product_id'];
    
                $product_array = array(
                                    'product_id' => $_POST['product_id'],
                                    'product_name' => $_POST['product_name'],
                                    'product_price' => $_POST['product_price'],
                                    'product_image' => $_POST['product_image'],
                                    'product_quantity' => $_POST['product_quantity']
                );
    
                $_SESSION['cart'][$product_id] =  $product_array;
                
            }
            else{ // product has already been added

                echo '<script>alert("Product was already to cart");</script>';
                // echo '<script>window.location = "index.php";</script>';


            }


        }
        else{ //if this is the first product
            $product_id     = $_POST['product_id'];
            $product_name   = $_POST['product_name'];
            $product_price  = $_POST['product_price'];
            $product_image  = $_POST['product_image'];
            $product_quantity  = $_POST['product_quantity'];

            $product_array = array(
                                'product_id' => $product_id,
                                'product_name' => $product_name,
                                'product_price' => $product_price,
                                'product_image' => $product_image,
                                'product_quantity' => $product_quantity
            );

            $_SESSION['cart'][$product_id] =  $product_array;
            //[ 2=>[], 3=>[], 5=>[] ]
        }

        //calculate total
        calculateTotalCart();
        
    }
    else if (isset($_POST['remove_product'])) { // xóa sản phẩm
        $product_id = $_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);
            
        //cập nhật lại tổng giá trị giỏ hàng
        calculateTotalCart();
    }
    else if (isset($_POST['edit_quantity'])) {

        //cập nhật số lượng giỏ hàng
        $product_id = $_POST['product_id'];
        $product_quantity = $_POST['product_quantity'];


        //get the product array from the session
        $product_array = $_SESSION['cart'][$product_id]; 

        //update product quantity
        $product_array['product_quantity'] =  $product_quantity;

        //return array back its place 
        $_SESSION['cart'][$product_id] = $product_array;

        //calculate total product
        calculateTotalCart();
    }
    else{
        // header('location:index.php');

    }

    function calculateTotalCart(){
        $total_price = 0;
        $total_quantiry = 0;


        foreach($_SESSION['cart'] as $key => $value){

            $product = $_SESSION['cart'][$key];

            $price = $product['product_price'];

            $quantity = $product['product_quantity'];

            $total_price =  $total_price + ($price *  $quantity); //tính tổng giá trị giỏ hàng

            $total_quantiry = $total_quantiry+$quantity; //tính tổng số lượng sản phẩm
        }

        $_SESSION['total'] = $total_price;
        $_SESSION['quantiry'] = $total_quantiry;

    }


?>




    

     <!--Cart-->
     <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Giỏ Hàng Của Bạn</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>

          
            <?php if(isset($_SESSION['cart'])) {?>
            <?php foreach($_SESSION['cart'] as $key => $value){ ?>

            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image']; ?>"/>
                        <div>
                            <p><?php echo $value['product_name']; ?></p>
                            <small><span>$</span><?php echo $value['product_price']; ?></small>
                            <br>

                            <form method="POST" action="cart.php">
                                 <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                                 <input type="submit" name="remove_product" class="remove-btn" value="xóa"/>
                            </form>
                           
                        </div>
                    </div>
                </td>

                <td>
                    
                    <form method="POST" action="cart.php">
                        <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>"/>
                        <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>"/>
                        <input type="submit" class="edit-btn" value="sửa" name="edit_quantity"/>
                    </form>
                    
                </td>

                <td>
                    
                    <span class="product-price">$<?php  echo $value['product_quantity'] * $value['product_price']; ?></span>
                </td>
            </tr>

         
            <?php } ?>

            <?php } ?>


            

         
        </table>


        <div class="cart-total">
          <table>
            <!-- <tr>
              <td>Subtotal</td>
              <td>$155</td>
            </tr> -->
            <tr>
              <td>Tổng</td>
              <?php if(isset($_SESSION['cart'])){?>
                 <td>$<?php echo $_SESSION['total']; ?></td>
               <?php } ?>  
            </tr>
          </table>
        </div>
    

        <div class="checkout-container">
          <form method="POST" action="checkout.php">
             <input type="submit" class="btn checkout-btn" value="Thanh toán" name="checkout">
          </form>
        </div>


    </section>


    <?php include('layouts/footer.php');?>