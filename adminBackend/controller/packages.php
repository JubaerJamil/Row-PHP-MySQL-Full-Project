<?php
session_start();
include '../../config/connection.php';


if(isset($_POST['savebtn'])){
    $p_name = trim($_POST['p_name'] ?? '');
    $p_duration = trim($_POST['p_duration'] ?? '');
    $p_amount = $_POST['p_amount'] ?? '';
    $have_dis = $_POST['have_dis'];
    $dis_amount = $_POST['dis_amount'];
    $p_c_1 = trim($_POST['p_c_1'] ?? '');
    $p_c_2 = trim($_POST['p_c_2'] ?? '');
    $p_c_3 = trim($_POST['p_c_3'] ?? '');
    $p_c_4 = trim($_POST['p_c_4'] ?? '');
    $p_c_5 = trim($_POST['p_c_5'] ?? '');
    $p_c_6 = trim($_POST['p_c_6'] ?? '');
    $p_c_7 = trim($_POST['p_c_7'] ?? '');
    $popular = $_POST['popular'];
    $status = $_POST['status'];

    if (empty($p_name) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_name) || strlen($p_name) > 191) {
        echo "<script>alert('Invalid input. Please ensure the package name is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_duration) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_duration) || strlen($p_duration) > 191){
        echo "<script>alert('Invalid input. Please ensure the package duration is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_amount) || !preg_match('/^[0-9]+$/', $p_amount)){
        echo "<script>alert('Invalid input : Please ensure the package price is filled, and contains only numbers.');
        window.history.back();
        </script>";
        exit;
    }elseif($have_dis == null || !preg_match('/^[0-9]+$/', $p_amount)){
        echo "<script>alert('Invalid input : Please ensure the package \"Have any discount\" is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_1) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_1) || strlen($p_c_1) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 01 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_2) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_2) || strlen($p_c_2) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 02 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_3) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_3) || strlen($p_c_3) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 03 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_4) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_4) || strlen($p_c_4) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 04 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_5) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_5) || strlen($p_c_5) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 05 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_6) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_6) || strlen($p_c_6) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 06 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_7) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_7) || strlen($p_c_7) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 07 is filled, contains only letters, numbers, spaces and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($popular == null || !preg_match('/^[0-9]+$/', $popular)){
        echo "<script>alert('Invalid input : Please ensure the package popular option is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null || !preg_match('/^[0-9]+$/', $status)){
        echo "<script>alert('Invalid input : Please ensure the package status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else {
        $insertQuery = "INSERT INTO package_price (p_name, p_price, p_dis_amount, p_duration, item_1, item_2, item_3, item_4, item_5, item_6, item_7, popular, have_dis, status)
                        VALUE('$p_name', '$p_amount', '$dis_amount', '$p_duration', '$p_c_1', '$p_c_2', '$p_c_3', '$p_c_4', '$p_c_5', '$p_c_6', '$p_c_7', '$popular', '$have_dis', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if($insertQuery_run){
            $_SESSION['success'] = 'Insert successfully done';
            header('location: ../package_qa/package/index.php');
        }else{
            $_SESSION['error'] = 'Request Failed';
            header('location: ../package_qa/package/create.php');
        }
    }
}


if(isset($_POST['updatebtn'])){
    $id= $_POST['id'];
    $p_name = trim($_POST['p_name'] ?? '');
    $p_duration = trim($_POST['p_duration'] ?? '');
    $p_amount = $_POST['p_amount'] ?? '';
    $have_dis = $_POST['have_dis'];
    $dis_amount = $_POST['dis_amount'];
    $p_c_1 = trim($_POST['p_c_1'] ?? '');
    $p_c_2 = trim($_POST['p_c_2'] ?? '');
    $p_c_3 = trim($_POST['p_c_3'] ?? '');
    $p_c_4 = trim($_POST['p_c_4'] ?? '');
    $p_c_5 = trim($_POST['p_c_5'] ?? '');
    $p_c_6 = trim($_POST['p_c_6'] ?? '');
    $p_c_7 = trim($_POST['p_c_7'] ?? '');
    $popular = $_POST['popular'];
    $status = $_POST['status'];

    if (empty($p_name) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_name) || strlen($p_name) > 191) {
        echo "<script>alert('Invalid input. Please ensure the package name is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_duration) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_duration) || strlen($p_duration) > 191){
        echo "<script>alert('Invalid input. Please ensure the package duration is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_amount) || !preg_match('/^[0-9]+$/', $p_amount)){
        echo "<script>alert('Invalid input : Please ensure the package price is filled, and contains only numbers.');
        window.history.back();
        </script>";
        exit;
    }elseif($have_dis == null || !preg_match('/^[0-9]+$/', $p_amount)){
        echo "<script>alert('Invalid input : Please ensure the package \"Have any discount\" is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_1) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_1) || strlen($p_c_1) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 01 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_2) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_2) || strlen($p_c_2) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 02 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_3) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_3) || strlen($p_c_3) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 03 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_4) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_4) || strlen($p_c_4) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 04 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_5) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_5) || strlen($p_c_5) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 05 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_6) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_6) || strlen($p_c_6) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 06 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif(empty($p_c_7) || !preg_match('/^[a-zA-Z0-9\s&(),\'\/]+$/', $p_c_7) || strlen($p_c_7) > 191){
        echo "<script>alert('Invalid input. Please ensure the package content 07 is filled, contains only letters, numbers, spaces, and only use { & , ' () / }, and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($popular == null || !preg_match('/^[0-9]+$/', $popular)){
        echo "<script>alert('Invalid input : Please ensure the package popular option is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null || !preg_match('/^[0-9]+$/', $status)){
        echo "<script>alert('Invalid input : Please ensure the package status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else {
        $updateQuery = "UPDATE package_price SET p_name = '$p_name', p_price = '$p_amount', p_dis_amount = '$dis_amount', p_duration = '$p_duration', 
                        item_1 = '$p_c_1', item_2 = '$p_c_2', item_3 = '$p_c_3', item_4 = '$p_c_4', item_5 = '$p_c_5', item_6 = '$p_c_6', item_7 = '$p_c_7', 
                        popular = '$popular', have_dis = '$have_dis', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if($updateQuery_run){
            $_SESSION['success'] = 'Update successfully done';
            header('location: ../package_qa/package/index.php');
        }else{
            $_SESSION['error'] = 'Request Faileddd';
            header('location: ../package_qa/package/create.php');
        }
    }
}




if (isset($_POST['deleteBtn'])) {

    $id = $_POST['delete_id'];
    $delete_query = "DELETE FROM package_price WHERE id=$id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['success'] = "Delete successfully done!";
        header('location: ../package_qa/package/index.php');
    } else {
        $_SESSION['error'] = "Request Failed";
        header('location: ../package_qa/package/index.php');
    }
}