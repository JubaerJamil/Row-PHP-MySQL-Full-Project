<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['savebtn'])){
    $question = trim($_POST['question'] ?? '');
    $answer = trim($_POST['answer'] ?? '');
    $status = $_POST['status'];

    if($question == null || !preg_match('/^[a-zA-Z0-9\s&?]+$/', $question) || strlen($question) > 255){
        echo "<script>alert('Invalid input. Please ensure the question field is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($answer == null){
        echo "<script>alert('Invalid input. Please ensure the answer field is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $insertQuery = "INSERT INTO q_and_ans (question, answer, status) 
        VALUES ('$question', '$answer', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../package_qa/q&a/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../package_qa/q&a/create.php');
        }
    }
}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $question = trim($_POST['question'] ?? '');
    $answer = trim($_POST['answer'] ?? '');
    $status = $_POST['status'];

    if($question == null || !preg_match('/^[a-zA-Z0-9\s&?]+$/', $question) || strlen($question) > 255){
        echo "<script>alert('Invalid input. Please ensure the question field is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    }elseif($answer == null){
        echo "<script>alert('Invalid input. Please ensure the answer field is filled.');
        window.history.back();
        </script>";
        exit;
    }elseif($status == null){
        echo "<script>alert('Invalid input. Please ensure the status option is filled.');
        window.history.back();
        </script>";
        exit;
    }else{

        $updateQuery = "UPDATE q_and_ans SET question = '$question', answer = '$answer', status = '$status' WHERE id = $id";
        $updateQuery_run = mysqli_query($connection, $updateQuery);

        if ($updateQuery_run) {
            $_SESSION['status'] = "Update successfully done";
            header('location: ../package_qa/q&a/index.php');

        } else {
            $_SESSION['failed'] = "Update failed";
            header('location: ../package_qa/q&a/edit.php');
        }
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM q_and_ans WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done";
        header('location: ../package_qa/q&a/index.php');

    } else {
        $_SESSION['failed'] = "Delete Request failed";
        header('location: ../package_qa/q&a/index.php');
    }
}