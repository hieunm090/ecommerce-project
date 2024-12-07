<?php include('layouts/header.php');?>

<?php 
  
// Xử lý data gửi từ form
    if(isset($_POST['order_pay_btn'])){

        $order_status = $_POST['order_status'];
        $order_total_price = $_POST['order_total_price'];
    }




?>






    <!-- Payment -->
    <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
            <h2 class="form-weight-bold">Thanh toán</h2>
            <hr class="mx-auto">
        </div>
        <div class="mx-auto container text-center">


            <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid") {?>
                <?php $amount = strval($_POST['order_total_price']);?>
                <?php $order_id = $_POST['order_id']; ?>
                <p>Tổng số tiền : $<?php echo $_POST['order_total_price']; ?></p>
                <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->

                <!-- Set up a container element for the button -->
                 <div id="paypal-button-container"></div>


            <?php } else if(isset($_SESSION['total']) && $_SESSION['total'] != 0) {?>
                <?php $amount = strval($_SESSION['total']);?>
                <?php $order_id = $_SESSION['order_id']; ?>
                <p>Tổng tiền : $<?php echo $_SESSION['total'];?></p>
                <!-- <input type="submit" class="btn btn-primary" value="Pay Now"> -->

                <!-- Set up a container element for the button -->
                <div id="paypal-button-container"></div>


            <?php } else {?>

                <p>Bạn chưa có đơn hàng.</p>

            <?php }?>

           

          
        </div>
    </section>


    <!-- ở đây sử dụng một tài khoản sandbox để thử nghiệm-->
    <script src="https://www.paypal.com/sdk/js?client-id=AZstqEEdmFforyoXROMw_nX6ceE_ADHRAUuv0XK_ky7vsQccZctvPzHYFvqB0tKEBz55yL46u0j_bB1o&currency=USD"></script>
    
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?=$amount;?>' // số tiền thanh toán, lấy từ biến php
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nXem console để biết tất cả chi tiết có sẵn.`);
            
            window.location.href = "server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?=$order_id?>; 
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>



    <?php include('layouts/footer.php');?>