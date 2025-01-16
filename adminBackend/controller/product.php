<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $cat_id = $_POST['category_id'];
    $product_name = trim($_POST['product_name'] ?? '');
    $product_price = trim($_POST['product_price'] ?? '');
    $have_dis = $_POST['have_dis'];
    $link = $_POST['link'];
    $dis_amount = $_POST['dis_amount'];
    $short_dis = trim($_POST['short_dis'] ?? '');
    $long_des = $_POST['long_des'];

    $Image = $_FILES['image']['name'];
    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if ($cat_id == null || !preg_match('/^[0-9]+$/', $cat_id)) {
        echo "<script>alert('Invalid input. Please ensure the category field is selected.');
        window.history.back();
        </script>";
        exit;
    }elseif($product_name == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $product_name) || strlen($product_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the product name is filled, contains only letters, numbers, spaces, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($product_price  == null || !preg_match('/^[0-9]+$/', $product_price)){
        echo "<script>alert('Invalid input : Please ensure the product price is filled, and contains only numbers.');
        window.history.back();
        </script>";
        exit;
    }elseif($have_dis == null || !preg_match('/^[0-9]+$/', $have_dis)){
        echo "<script>alert('Invalid input : Please ensure the package \"Have any discount\" is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($link == null || !filter_var($link, FILTER_VALIDATE_URL) || strlen($link) > 255){
        echo "<script>alert('Invalid input. Please ensure Preview link is filled, contains a valid URL (also wih https:// Or http://) and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($short_dis == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $short_dis) || strlen($short_dis) > 255){
        echo "<script>alert('Invalid input. Please ensure the short description is filled, contains only letters, numbers, spaces, and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($long_des == null){
        echo "<script>alert('Invalid input. Please ensure the long description is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($Image == null){
        echo "<script>alert('Invalid input. Please select product image.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null || !preg_match('/^[0-9]+$/', $status)){
        echo "<script>alert('Invalid input : Please ensure the status option is select.');
        window.history.back();
        </script>";
        exit;
    }else{

        if($have_dis == 0){
            $discount_amount = 0;
        }else{
            if($dis_amount == null){
                echo "<script>alert('Please input discount amout');
                window.history.back();
                </script>";
                exit;
            }else{
                $discount_amount = $dis_amount;
            }
        }

        $insertQuery = "INSERT INTO products (category_id, product_name, product_short_info, price, dis_price, product_details, image, have_dis, preview_link, status) 
        VALUES ('$cat_id', '$product_name', '$short_dis', '$product_price', '$discount_amount', '$long_des', '$ImageName', '$have_dis', '$link', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/product_img/" . $ImageName);
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../products/products/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../products/products/create.php');
        }
    }

}



if(isset($_POST['editbtn'])){

    $id = $_POST['id'];
    $cat_id = $_POST['category_id'];
    $product_name = trim($_POST['product_name'] ?? '');
    $product_price = trim($_POST['product_price'] ?? '');
    $have_dis = $_POST['have_dis'];
    $dis_amount = $_POST['dis_amount'];
    $link = $_POST['link'];
    $short_dis = trim($_POST['short_dis'] ?? '');
    $long_des = $_POST['long_des'];

    $Image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if ($cat_id == null || !preg_match('/^[0-9]+$/', $cat_id)) {
        echo "<script>alert('Invalid input. Please ensure the category field is selected.');
        window.history.back();
        </script>";
        exit;
    }elseif($product_name == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $product_name) || strlen($product_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the product name is filled, contains only letters, numbers, spaces, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($product_price  == null || !preg_match('/^[0-9]+$/', $product_price)){
        echo "<script>alert('Invalid input : Please ensure the product price is filled, and contains only numbers.');
        window.history.back();
        </script>";
        exit;
    }elseif($have_dis == null || !preg_match('/^[0-9]+$/', $have_dis)){
        echo "<script>alert('Invalid input : Please ensure the package \"Have any discount\" is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($link == null || !filter_var($link, FILTER_VALIDATE_URL) || strlen($link) > 255){
        echo "<script>alert('Invalid input. Please ensure Preview link is filled, contains a valid URL (also wih https:// Or http://) and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($short_dis == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $short_dis) || strlen($short_dis) > 255){
        echo "<script>alert('Invalid input. Please ensure the short description is filled, contains only letters, numbers, spaces, and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($long_des == null){
        echo "<script>alert('Invalid input. Please ensure the long description is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null || !preg_match('/^[0-9]+$/', $status)){
        echo "<script>alert('Invalid input : Please ensure the status option is select.');
        window.history.back();
        </script>";
        exit;
    }else{

        if($have_dis == 0){
            $discount_amount = 0;
        }else{
            if($dis_amount == null){
                echo "<script>alert('Please input discount amout');
                window.history.back();
                </script>";
                exit;
            }else{
                $discount_amount = $dis_amount;
            }
        }

        if ($Image != null) {
            $updateImage = $ImageName;
        } else {
            $updateImage = $old_image;
        }

        $editQuery = "UPDATE products SET category_id='$cat_id', product_name='$product_name', product_short_info = '$short_dis', price = '$product_price',
                                    dis_price= '$discount_amount', product_details = '$long_des', image='$updateImage', have_dis = '$have_dis', preview_link = '$link', status='$status' WHERE id= $id";
        $editQuery_run = mysqli_query($connection, $editQuery);

        if ($editQuery_run) {

            if ($Image != null) {
                move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/product_img/" . $updateImage);
                unlink('../../upload/product_img/' . $old_image);
            }

            $_SESSION['success'] = "Update successfully done";
            header('location: ../products/products/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../products/products/edit.php');
        }
    }

}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['delete_id'];
    $image = $_POST['image'];

    $delete_query = "DELETE FROM products WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        unlink('../../upload/product_img/' . $image);
        $_SESSION['status'] = "Delete successfully done!";
        header('location: ../products/products/index.php');
    } else {
        $_SESSION['failed'] = "Delete Failed";
        header('location: ../products/products/index.php');
    }
}