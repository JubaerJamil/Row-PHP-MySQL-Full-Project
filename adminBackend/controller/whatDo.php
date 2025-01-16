<?php
session_start();
include '../../config/connection.php';

if (isset($_POST['savebtn'])){

    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);

    $Image = $_FILES['image']['name'];
    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if($title == null){
        echo "<script>alert('Please fill up title field');</script>";
    }elseif ($content == null) {
        echo "<script>alert('Please fill up content field');</script>";
    }elseif ($Image == null) {
        echo "<script>alert('Please fill up image field');</script>";
    }elseif ($status == null) {
        echo "<script>alert('Please fill up status field');</script>";
    }else {
        $insertQuery = "INSERT INTO what_i_do (title, content, image, status) 
        VALUES ('$title', '$content', '$ImageName', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);

        if ($insertQuery_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/whatDo/" . $ImageName);
            $_SESSION['status'] = "Inserted successfully done";
            header('location: ../whatDo/index.php');

        } else {
            $_SESSION['failed'] = "Inserted failed";
            header('location: ../whatDo/create.php');
        }
    }

}


if(isset($_POST['editbtn'])){
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);

    $Image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = isset($_POST['status']) ? (int) $_POST['status'] : null;

    if ($Image != null) {
        $updateImage = $ImageName;
    } else {
        $updateImage = $old_image;
    }

    $editQuery = "UPDATE what_i_do SET title='$title', content='$content', image='$updateImage', status='$status' WHERE id= $id";
    $editQuery_run = mysqli_query($connection, $editQuery);

    if ($editQuery_run) {

        if ($Image != null) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/whatDo/" . $updateImage);
            unlink('../../upload/whatDo/' . $old_image);
        }

        $_SESSION['status'] = "Update successfully done";
        header('location: ../whatDo/index.php');

    } else {
        $_SESSION['failed'] = "Product update failed";
        header('location: ../whatDo/create.php');
    }

}



if (isset($_POST['deleteBtn'])) {
    $id = $_POST['id'];
    $image = $_POST['image'];

    $delete_query = "DELETE FROM what_i_do WHERE id=$id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        unlink('../../upload/whatDo/' . $image);
        $_SESSION['status'] = "Delete successfully done!";
        header('location: ../whatDo/index.php');
    } else {
        $_SESSION['failed'] = "Request Failed";
        header('location: ../whatDo/index.php');
    }
}


