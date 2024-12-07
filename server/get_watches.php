<?php 

    include('connection.php');

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'đồng hồ' LIMIT 4");

    $stmt->execute();

    $watches_produts = $stmt->get_result(); // return array []


?>