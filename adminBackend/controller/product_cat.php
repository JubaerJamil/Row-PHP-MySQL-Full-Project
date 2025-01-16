<?php
session_start();
include '../../config/connection.php';


if(isset($_POST['savebtn'])){
    $cat_name = trim($_POST['name']);
    $status = $_POST['status'];

    if($cat_name == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $cat_name) || strlen($cat_name) > 35){
        echo "<script>alert('Please ensure the category name is filled, contains only letters, numbers, spaces, and is less than 35 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Please select status field');
        window.history.back();
        </script>";
        exit;
    }else {
        $insertQuery = "INSERT INTO product_categories (category_name, status) VALUE('$cat_name', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if($insertQuery_run){
            $_SESSION['success'] = 'Insert successfully done';
            header('location: ../products/categories/index.php');
        }else{
            $_SESSION['error'] = 'Request Failed';
            header('location: ../products/categories/create.php');
        }
    }
}


if(isset($_POST["updatebtn"])){

    $id = $_POST['id'];
    $cat_name = $_POST['name'];
    $status = $_POST['status'];

    if($cat_name == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $cat_name) || strlen($cat_name) > 35){
        echo "<script>alert('Please ensure the category name is filled, contains only letters, numbers, spaces, and is less than 35 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Please select status field');
        window.history.back();
        </script>";
        exit;
    }else{
        $editQuery = "UPDATE product_categories SET category_name = '$cat_name', status= '$status' WHERE ID=$id";
        $editQuery_run = mysqli_query($connection, $editQuery);
    
        if($editQuery_run){
            $_SESSION['success'] = 'Insert successfully done';
            header('location: ../products/categories/index.php');
        }else{
            $_SESSION['error'] = 'Insert Request Failed';
            header('location: ../products/categories/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $id = $_POST['id'];

    $delete_query = "DELETE FROM product_categories WHERE id=$id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['success'] = "Delete successfully done!";
        header('location: ../products/categories/index.php');
    } else {
        $_SESSION['error'] = "Request Failed";
        header('location: ../products/categories/index.php');
    }
}