<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $c_name = trim($_POST['c_name'] ?? '');
    $c_pro = trim($_POST['c_pro'] ?? '');
    $raing = $_POST['raing'];
    $review = trim($_POST['review'] ?? '');

    $Image = $_FILES['image']['name'];
    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if($c_name == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $c_name) || strlen($c_name) > 55){
        echo "<script>alert('Invalid input. Please ensure the client name is filled, contains only letters, numbers, spaces, and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($c_pro == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $c_pro) || strlen($c_pro) > 55){
        echo "<script>alert('Invalid input. Please ensure the client profession is filled, contains only letters, numbers, spaces, and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($raing == null || !preg_match('/^[0-9]+$/', $raing)){
        echo "<script>alert('Invalid input : Please ensure the rating option is select.');
        window.history.back();
        </script>";
        exit;
    }elseif($review == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $review) || strlen($review) > 191){
        echo "<script>alert('Invalid input. Please ensure the blog subject is filled, contains only letters, numbers, spaces, and is less than 191 characters.');
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

        $insertQuery = "INSERT INTO review (client_name, client_pro, review, star, image, status) 
                            VALUES ('$c_name', '$c_pro', '$review', '$raing', '$ImageName', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/review/" . $ImageName);
            $_SESSION['success'] = "Inserted successfully done";
            header('location: ../review/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../review/create.php');
        }
    }

}



if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $old_image = $_POST['old_image'];
    $c_name = trim($_POST['c_name'] ?? '');
    $c_pro = trim($_POST['c_pro'] ?? '');
    $raing = $_POST['raing'];
    $review = trim($_POST['review'] ?? '');

    $Image = $_FILES['image']['name'];
    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if($c_name == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $c_name) || strlen($c_name) > 55){
        echo "<script>alert('Invalid input. Please ensure the client name is filled, contains only letters, numbers, spaces, and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($c_pro == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $c_pro) || strlen($c_pro) > 55){
        echo "<script>alert('Invalid input. Please ensure the client profession is filled, contains only letters, numbers, spaces, and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($raing == null || !preg_match('/^[0-9]+$/', $raing)){
        echo "<script>alert('Invalid input : Please ensure the rating option is select.');
        window.history.back();
        </script>";
        exit;
    }elseif($review == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $review) || strlen($review) > 191){
        echo "<script>alert('Invalid input. Please ensure the blog subject is filled, contains only letters, numbers, spaces, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null || !preg_match('/^[0-9]+$/', $status)){
        echo "<script>alert('Invalid input : Please ensure the status option is select.');
        window.history.back();
        </script>";
        exit;
    }else{

        if ($Image != null) {
            $updateImage = $ImageName;
        } else {
            $updateImage = $old_image;
        }

        $editQuery = "UPDATE review SET client_name='$c_name', client_pro ='$c_pro', review = '$review', star = '$raing', image='$updateImage', status='$status' WHERE id= $id";
        $editQuery_run = mysqli_query($connection, $editQuery);

        if ($editQuery_run) {

            if ($Image != null) {
                move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/review/" . $updateImage);
                unlink('../../upload/review/' . $old_image);
            }

            $_SESSION['success'] = "Update successfully done";
            header('location: ../review/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../review/edit.php');
        }
    }

}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['delete_id'];
    $image = $_POST['image'];

    $delete_query = "DELETE FROM review WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        unlink('../../upload/review/' . $image);
        $_SESSION['success'] = "Delete successfully done!";
        header('location: ../review/index.php');
    } else {
        $_SESSION['failed'] = "Delete Failed";
        header('location: ../review/index.php');
    }
}