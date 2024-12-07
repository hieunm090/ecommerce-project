<?php 

    include('connection.php');

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category = 'giày' LIMIT 4");

    $stmt->execute();

    $shoes_produts = $stmt->get_result(); // return array []


?>