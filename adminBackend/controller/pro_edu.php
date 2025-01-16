<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $course_name = trim($_POST['course_name'] ?? '');
    $institute_name = trim($_POST['institute_name'] ?? '');
    $duration = trim($_POST['duration'] ?? '');
    $mentor_name = trim($_POST['mentor_name'] ?? '');
    $status = $_POST['status'];

    if($course_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $course_name) || strlen($course_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the course name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($institute_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $institute_name) || strlen($institute_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the institute name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($duration == null || !preg_match('/^[a-zA-Z0-9\s&-]+$/', $duration) || strlen($duration) > 85){
        echo "<script>alert('Invalid input. Please ensure the duration field is filled, contains only letters, numbers, spaces, ampersands (&), dash (-), and is less than 85 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($mentor_name == null || !preg_match('/^[a-zA-Z0-9\-.,&\s]+$/', $mentor_name) || strlen($mentor_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the mentor name is filled, contains only letters, numbers, spaces, ampersands (&), dash (-), point (.) and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{
        $insertQuery = "INSERT INTO pro_education (course_name, institute_name, course_duration, mentor, status)
        VALUES ('$course_name', '$institute_name', '$duration', '$mentor_name', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/education/pro_edu/index.php');
        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/education/pro_edu/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $course_name = trim($_POST['course_name'] ?? '');
    $institute_name = trim($_POST['institute_name'] ?? '');
    $duration = trim($_POST['duration'] ?? '');
    $mentor_name = trim($_POST['mentor_name'] ?? '');
    $status = $_POST['status'];

    if($course_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $course_name) || strlen($course_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the course name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($institute_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $institute_name) || strlen($institute_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the institute name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($duration == null || !preg_match('/^[a-zA-Z0-9\s&-]+$/', $duration) || strlen($duration) > 85){
        echo "<script>alert('Invalid input. Please ensure the duration field is filled, contains only letters, numbers, spaces, ampersands (&), dash (-), and is less than 85 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($mentor_name == null || !preg_match('/^[a-zA-Z0-9\-.,&\s]+$/', $mentor_name) || strlen($mentor_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the mentor name is filled, contains only letters, numbers, spaces, ampersands (&), dash (-), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        </script>";
        exit;
    }else{

        $updateQuery = "UPDATE pro_education SET course_name = '$course_name', institute_name = '$institute_name', course_duration = '$duration', mentor = '$mentor_name', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/education/pro_edu/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/education/pro_edu/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM pro_education WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/education/pro_edu/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/education/pro_edu/index.php');
    }
}