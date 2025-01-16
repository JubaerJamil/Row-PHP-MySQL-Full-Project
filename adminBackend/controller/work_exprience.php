<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $designation = trim($_POST['designation'] ?? '');
    $company_name = trim($_POST['company_name'] ?? '');
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $continue = $_POST['continue'];
    $description = trim($_POST['description'] ?? '');
    $status = (int) $_POST['status'];

    if($designation == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $designation) || strlen($designation) > 55){
        echo "<script>alert('Invalid input. Please ensure the designation is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($company_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $company_name) || strlen($company_name) > 55){
        echo "<script>alert('Invalid input. Please ensure the project details is filled, contains only letters, numbers, spaces, ampersands (&) and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($start_date == null){
        echo "<script>alert('Invalid input. Please ensure start date is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($description == null || !preg_match('/^[a-zA-Z0-9\-.,&\s]+$/', $description)){
        echo "<script>alert('Invalid input. Please ensure the description is filled, contains only letters, numbers, spaces, ampersands (&), comma (,), point (.).');
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

        $insertQuery = "INSERT INTO work_experience (designation, responsibility, company_name, start_date, end_date, contunue,  status)
        VALUES ('$designation', '$description', '$company_name', '$start_date', '$job_end_date', '$continue', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/work_experience/index.php');
        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/work_experience/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $designation = trim($_POST['designation'] ?? '');
    $company_name = trim($_POST['company_name'] ?? '');
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $continue = $_POST['continue'];
    $description = trim($_POST['description'] ?? '');
    $status = $_POST['status'];

    if($designation == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $designation) || strlen($designation) > 55){
        echo "<script>alert('Invalid input. Please ensure the designation is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($company_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $company_name) || strlen($company_name) > 91){
        echo "<script>alert('Invalid input. Please ensure the project details is filled, contains only letters, numbers, spaces, ampersands (&) and is less than 91 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($start_date == null){
        echo "<script>alert('Invalid input. Please ensure start date is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($description == null || !preg_match('/^[a-zA-Z0-9\-.,&\s]+$/', $description)){
        echo "<script>alert('Invalid input. Please ensure the description is filled, contains only letters, numbers, spaces, ampersands (&), comma (,), point (.).');
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

        $updateQuery = "UPDATE work_experience SET designation = '$designation', responsibility = '$description', company_name = '$company_name', start_date = '$start_date',
                            end_date = '$job_end_date', contunue = '$continue', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/work_experience/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/work_experience/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM work_experience WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/work_experience/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/work_experience/index.php');
    }
}