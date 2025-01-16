<?php
session_start();
include '../../config/connection.php';


if(isset($_POST['savebtn'])){
    $card_info = trim($_POST['info']);
    $status = $_POST['status'];

    if($card_info == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $card_info) || strlen($card_info) > 42){
        echo "<script>alert('Please ensure the category name is filled, contains only letters, number, spaces and is less than 42 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Please select status field');
        window.history.back();
        </script>";
        exit;
    }else {
        $insertQuery = "INSERT INTO product_card (card_info, status) VALUE('$card_info', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if($insertQuery_run){
            $_SESSION['success'] = 'Insert successfully done';
            header('location: ../products/live_card/index.php');
        }else{
            $_SESSION['error'] = 'Request Failed';
            header('location: ../products/live_card/create.php');
        }
    }
}

if(isset($_POST["updatebtn"])){

    $id = $_POST['id'];
    $card_info = $_POST['info'];
    $status = $_POST['status'];

    if($card_info == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $card_info) || strlen($card_info) > 42){
        echo "<script>alert('Please ensure the category name is filled, contains only letters, numbers, spaces, and is less than 42 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Please select status field');
        window.history.back();
        </script>";
        exit;
    }else{
        $editQuery = "UPDATE product_card SET card_info = '$card_info', status= '$status' WHERE ID=$id";
        $editQuery_run = mysqli_query($connection, $editQuery);
    
        if($editQuery_run){
            $_SESSION['success'] = 'Insert successfully done';
            header('location: ../products/live_card/index.php');
        }else{
            $_SESSION['error'] = 'Insert Request Failed';
            header('location: ../products/live_card/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $id = $_POST['id'];

    $delete_query = "DELETE FROM product_categories WHERE id=$id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['success'] = "Delete successfully done!";
        header('location: ../products/live_card/index.php');
    } else {
        $_SESSION['error'] = "Request Failed";
        header('location: ../products/live_card/index.php');
    }
}