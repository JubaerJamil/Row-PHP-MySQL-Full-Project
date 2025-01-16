<?php
session_start();
include '../config/connection.php';


if (isset($_POST['savebtn'])) {

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = $_POST['phone'];
    $location = trim($_POST['location'] ?? '');
    $message = trim($_POST['message'] ?? '');


    if ($name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $name) || strlen($name) > 191) {
        echo "<script>alert('Invalid input. Please ensure the name field is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 191 characters.'); window.history.back();</script>";
        exit;
    } elseif ($email == null || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 191) {
        echo "<script>alert('Invalid input. Please ensure the email field is filled, contains a valid email address, and is less than 191 characters.'); window.history.back();</script>";
        exit;
    } elseif ($phone == null || !preg_match('/^\+?[0-9\s\(\)-]+$/', $phone)) {
        echo "<script>alert('Invalid input. Please ensure the phone number is filled and contains only numbers with 7 to 20 digits.'); window.history.back();</script>";
        exit;
    } elseif ($location == null || !preg_match('/^[a-zA-Z0-9\s&\/,\-+()]+$/', $location) || strlen($location) > 191) {
        echo "<script>alert('Invalid input. Please ensure the location field is filled, contains only letters, numbers, spaces, commas (,), slashes (/), ampersands (&), dashes (-), and is less than 191 characters.'); window.history.back();</script>";
        exit;
    } elseif ($message == null || !preg_match('/^[a-zA-Z0-9\s&,.!?]+$/', $message)) {
        echo "<script>alert('Invalid input. Please ensure the message field is filled, contains only letters, numbers, spaces, ampersands (&), and common punctuation (. , ! ?).'); window.history.back();</script>";
        exit;
    } else {
        $insertQuery = $connection->prepare("INSERT INTO contact (name, phone, email, location, message) VALUES (?, ?, ?, ?, ?)");
        $insertQuery->bind_param('sssss', $name, $phone, $email, $location, $message);
        $insertQuery_run = $insertQuery->execute();

        if ($insertQuery_run) {
            $_SESSION['success'] = "Thanks for your message. We will contact you very soon.";
            header('Location: ../contact.php');

        } else {
            $_SESSION['failed'] = "Message sending failed. Please try again. Error: " . $connection->error;
            header('Location: ../contact.php');
        }
        $insertQuery->close();
    }
}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['id'];

    $delete_query = "DELETE FROM contact WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        $_SESSION['status'] = "Delete successfully done!";
        header('location: ../adminBackend/contact/index.php');
    } else {
        $_SESSION['failed'] = "Delete Failed";
        header('location: ../adminBackend/contact/index.php');
    }
}

