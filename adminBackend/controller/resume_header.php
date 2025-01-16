<?php
session_start();
include '../../config/connection.php';

if (isset($_POST['editbtn'])) {
    $id = intval($_POST['id']);
    $name = trim($_POST['name'] ?? '');
    $designation = trim($_POST['designation'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $website = trim($_POST['website'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $object = trim($_POST['object'] ?? '');

    $Image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    if (empty($name) || !preg_match('/^[a-zA-Z0-9\s&]+$/', $name) || strlen($name) > 55) {
        echo "<script>alert('Invalid input. Please ensure the name is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 55 characters.'');
        window.history.back();</script>";
        exit;
    }
    if (empty($designation) || !preg_match('/^[a-zA-Z0-9\s&]+$/', $designation) || strlen($designation) > 55) {
        echo "<script>alert('Invalid input. Please ensure the designation is filled, contains only letters, numbers, spaces, ampersands (&), and is less than 55 characters.');
        window.history.back();</script>";
        exit;
    }
    if (empty($phone) || !preg_match('/^\+?[0-9\s\-]{11}$/', $phone)) {
        echo "<script>alert('Invalid input. Please ensure the phone is filled, contains only numbers, plus (+) and just 11 digits.');
        window.history.back();</script>";
        exit;
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 55) {
        echo "<script>alert('Invalid input. Please ensure the email is filled, contains valid Email, and is less than 55 characters.');
        window.history.back();</script>";
        exit;
    }
    if (empty($website) || !filter_var($website, FILTER_VALIDATE_URL) || strlen($website) > 255) {
        echo "<script>alert('Invalid website: Ensure valid URL and max 255 characters.');
        window.history.back();</script>";
        exit;
    }
    if (empty($address)) {
        echo "<script>alert('Invalid input: Address is required.');
        window.history.back();</script>";
        exit;
    }
    if (empty($object)) {
        echo "<script>alert('Invalid input. Please ensure the object is filled.');
        window.history.back();</script>";
        exit;
    }

    if ($Image != null) {
        $updateImage = $ImageName;
    } else {
        $updateImage = $old_image;
    }

    $editQuery = "UPDATE resume_header SET name='$name', designation='$designation', phone='$phone', email = '$email', website = '$website',
    address = '$address', object = '$object', image='$updateImage' WHERE id= $id";
    $editQuery_run = mysqli_query($connection, $editQuery);

    if ($editQuery_run) {

        if ($Image != null) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/resume/" . $updateImage);
            unlink('../../upload/resume/' . $old_image);
        }

        $_SESSION['status'] = "Update successfully done";
        header('location: ../resume/header/create.php');

    } else {
        $_SESSION['failed'] = "Product update failed";
        header('location: ../resume/header/create.php');
    }
}
