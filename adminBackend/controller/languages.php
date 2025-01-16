<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $skill_name = trim($_POST['skill_name'] ?? '');
    $status = $_POST['status'];

    if($skill_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $skill_name) || strlen($skill_name) > 55){
        echo "<script>alert('Invalid input. Please ensure the language name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 55 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $insertQuery = "INSERT INTO language_skills (languages_name, status) 
        VALUES ('$skill_name', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/languages/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/languages/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $skill_name = trim($_POST['skill_name'] ?? '');
    $status = $_POST['status'];

    if($skill_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $skill_name) || strlen($skill_name) > 55){
        echo "<script>alert('Invalid input. Please ensure the languages name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 55 characters.');
        window.history.back();
        </script>";
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
    }else{

        $updateQuery = "UPDATE language_skills SET languages_name = '$skill_name', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/languages/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/languages/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM language_skills WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/languages/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/languages/index.php');
    }
}