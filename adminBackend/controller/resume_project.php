<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $project_title = trim($_POST['project_title'] ?? '');
    $project_details = trim($_POST['project_details'] ?? '');
    $link = trim($_POST['link'] ?? '');
    $status = $_POST['status'];

    if($project_title == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $project_title) || strlen($project_title) > 255){
        echo "<script>alert('Invalid input. Please ensure the project name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($project_details == null || !preg_match('/^[a-zA-Z0-9\s&.,-]+$/', $project_details)){
        echo "<script>alert('Invalid input. Please ensure the project details is filled and contains only letters, numbers, spaces, ampersands (&), commas, full stops, and dashes (-).');
        window.history.back();
        </script>";
        exit;
    }elseif($link == null || !filter_var($link, FILTER_VALIDATE_URL) || strlen($link) > 255){
        echo "<script>alert('Invalid input. Please ensure website is filled, contains a valid URL (also wih https:// Or http://).');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $insertQuery = "INSERT INTO resume_projects (project_name, project_details, project_link, status)
        VALUES ('$project_title', '$project_details', '$link', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/project/index.php');
        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/project/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $project_title = trim($_POST['project_title'] ?? '');
    $project_details = trim($_POST['project_details'] ?? '');
    $link = trim($_POST['link'] ?? '');
    $status = $_POST['status'];

    if($project_title == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $project_title) || strlen($project_title) > 255){
        echo "<script>alert('Invalid input. Please ensure the project name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($project_details == null || !preg_match('/^[a-zA-Z0-9\s&.,-]+$/', $project_details)){
        echo "<script>alert('Invalid input. Please ensure the project details is filled and contains only letters, numbers, spaces, ampersands (&), commas, full stops, and dashes (-).');
        window.history.back();
        </script>";
        exit;
    }elseif($link == null || !filter_var($link, FILTER_VALIDATE_URL) || strlen($link) > 255){
        echo "<script>alert('Invalid input. Please ensure website is filled, contains a valid URL (also wih https:// Or http://).');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $today = date("Y-m-d"); 
        if($continue == 1){
            $job_end_date = $today;
        }else{
            $job_end_date = $end_date;
        }

        $updateQuery = "UPDATE resume_projects SET project_name = '$project_title', project_details = '$project_details', project_link = '$link', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/project/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/project/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM resume_projects WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/project/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/project/index.php');
    }
}