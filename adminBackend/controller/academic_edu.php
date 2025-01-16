<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $edu_title = trim($_POST['edu_title'] ?? '');
    $institute_name = trim($_POST['institute_name'] ?? '');
    $result = trim($_POST['result'] ?? '');
    $passing_year = $_POST['passing_year'];
    $status = $_POST['status'];

    if($edu_title == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $edu_title) || strlen($edu_title) > 191){
        echo "<script>alert('Invalid input. Please ensure the education title is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($institute_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $institute_name) || strlen($institute_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the institute name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($result == null || !preg_match('/^[a-zA-Z0-9\.s&-]+$/', $result) || strlen($result) > 55){
        echo "<script>alert('Invalid input. Please ensure the result field is filled, contains only letters, numbers, spaces, ampersands (&), dash (-), point(.), and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($passing_year == null || !preg_match('/^[0-9]+$/', $passing_year)){
        echo "<script>alert('Invalid input. Please ensure the passing year is filled and contains only numbers.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{
        $insertQuery = "INSERT INTO academic_edu (edu_title, institute_name, result, passing_year, status)
        VALUES ('$edu_title', '$institute_name', '$result', '$passing_year', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/education/academic_edu/index.php');
        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/education/academic_edu/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $edu_title = trim($_POST['edu_title'] ?? '');
    $institute_name = trim($_POST['institute_name'] ?? '');
    $result = trim($_POST['result'] ?? '');
    $passing_year = $_POST['passing_year'];
    $status = $_POST['status'];

    if($edu_title == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $edu_title) || strlen($edu_title) > 191){
        echo "<script>alert('Invalid input. Please ensure the education title is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($institute_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $institute_name) || strlen($institute_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the institute name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($result == null || !preg_match('/^[a-zA-Z0-9\s.&-]+$/', $result) || strlen($result) > 85){
        echo "<script>alert('Invalid input. Please ensure the result is filled, contains only letters, numbers, spaces, ampersands (&), dash (-), point(.), and is less than 85 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($passing_year == null || !preg_match('/^[0-9]+$/', $passing_year)){
        echo "<script>alert('Invalid input. Please ensure the passing year is filled, contains only numbers.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        </script>";
        exit;
    }else{

        $updateQuery = "UPDATE academic_edu SET edu_title = '$edu_title', institute_name = '$institute_name', result = '$result', passing_year = '$passing_year', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/education/academic_edu/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/education/academic_edu/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM academic_edu WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/education/academic_edu/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/education/academic_edu/index.php');
    }
}