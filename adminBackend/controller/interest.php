<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $interest_name = trim($_POST['interest_name'] ?? '');
    $status = $_POST['status'];

    if($interest_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $interest_name) || strlen($interest_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the interest name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $insertQuery = "INSERT INTO interests (interest_name, status) 
        VALUES ('$interest_name', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/interests/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/interests/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $interest_name = trim($_POST['interest_name'] ?? '');
    $status = $_POST['status'];

    if($interest_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $interest_name) || strlen($interest_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the interest name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $updateQuery = "UPDATE interests SET interest_name = '$interest_name', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/interests/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/interests/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM interests WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/interests/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/interests/index.php');
    }
}