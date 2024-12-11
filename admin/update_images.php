<?php 
include("../server/connection.php");

if(isset($_POST['update_images'])) {

    // Kiểm tra xem product_id và product_name có tồn tại không
    if (!isset($_POST['product_id']) || !isset($_POST['product_name'])) {
        header('Location: products.php?images_failed=Thiếu thông tin sản phẩm.');
        exit;
    }

    $product_name = $_POST['product_name'];
    $product_id = $_POST['product_id'];

    // Kiểm tra các file tải lên
    $image1 = $_FILES['image1'];
    $image2 = $_FILES['image2'];
    $image3 = $_FILES['image3'];
    $image4 = $_FILES['image4'];

    // Kiểm tra nếu tất cả các file đã được tải lên thành công
    if ($image1['error'] != UPLOAD_ERR_OK || $image2['error'] != UPLOAD_ERR_OK || 
        $image3['error'] != UPLOAD_ERR_OK || $image4['error'] != UPLOAD_ERR_OK) {
        header('Location: products.php?images_failed=Lỗi tải ảnh. Vui lòng thử lại.');
        exit;
    }

    // Kiểm tra kích thước và định dạng của ảnh 
    $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
    $max_size = 5 * 1024 * 1024; // 5MB max file size

    foreach ([$image1, $image2, $image3, $image4] as $image) {
        if (!in_array($image['type'], $allowed_types)) {
            header('Location: products.php?images_failed=Định dạng ảnh không hợp lệ.');
            exit;
        }
        if ($image['size'] > $max_size) {
            header('Location: products.php?images_failed=Ảnh vượt quá kích thước cho phép.');
            exit;
        }
    }

    // Đặt tên ảnh dựa trên tên sản phẩm
    $image_name1 = $product_name . "1.jpeg";
    $image_name2 = $product_name . "2.jpeg";
    $image_name3 = $product_name . "3.jpeg";
    $image_name4 = $product_name . "4.jpeg";

    // Thư mục upload ảnh
    $upload_dir = "assets/imgs/";

    // Kiểm tra nếu thư mục upload tồn tại và có quyền ghi
    if (!is_dir($upload_dir) || !is_writable($upload_dir)) {
        header('Location: products.php?images_failed=Không có quyền ghi vào thư mục ảnh.');
        exit;
    }

    // Di chuyển các file đã tải lên vào thư mục imgs
    if (!move_uploaded_file($image1['tmp_name'], $upload_dir . $image_name1) ||
        !move_uploaded_file($image2['tmp_name'], $upload_dir . $image_name2) ||
        !move_uploaded_file($image3['tmp_name'], $upload_dir . $image_name3) ||
        !move_uploaded_file($image4['tmp_name'], $upload_dir . $image_name4)) {
        header('Location: products.php?images_failed=Lỗi di chuyển ảnh. Vui lòng thử lại.');
        exit;
    }

    // Cập nhật tên ảnh vào cơ sở dữ liệu
    $stmt = $conn->prepare("UPDATE products SET product_image=?, product_image2=?, product_image3=?, product_image4=? WHERE product_id=?");

    // Kiểm tra nếu chuẩn bị câu lệnh thành công
    if ($stmt === false) {
        header('Location: products.php?images_failed=Lỗi cơ sở dữ liệu.');
        exit;
    }

    // Bind dữ liệu vào câu lệnh
    $stmt->bind_param('sssss', $image_name1, $image_name2, $image_name3, $image_name4, $product_id);

    // Thực thi câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        header('Location: products.php?images_updated=Hình ảnh được cập nhật thành công');
    } else {
        header('Location: products.php?images_failed=Lỗi xảy ra, vui lòng thử lại.');
    }

    // Đóng câu lệnh sau khi thực thi
    $stmt->close();
}
?>
