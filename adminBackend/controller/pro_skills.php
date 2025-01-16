<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $skill_name = trim($_POST['skill_name'] ?? '');
    $status = $_POST['status'];

    if($skill_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $skill_name) || strlen($skill_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the skill name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $insertQuery = "INSERT INTO pro_skills (pro_skill_name, status) 
        VALUES ('$skill_name', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../resume/skills/professional/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../resume/skills/professional/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $skill_name = trim($_POST['skill_name'] ?? '');
    $status = $_POST['status'];

    if($skill_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $skill_name) || strlen($skill_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the skill name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $updateQuery = "UPDATE pro_skills SET pro_skill_name = '$skill_name', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../resume/skills/professional/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../resume/skills/professional/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM pro_skills WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../resume/skills/professional/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../resume/skills/professional/index.php');
    }
}