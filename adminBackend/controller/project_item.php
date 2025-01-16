<?php
session_start();
include '../../config/connection.php';

if (isset($_POST["savebtn"])) {

    $category_id = $_POST["category_id"];
    $service_title = mysqli_real_escape_string($connection, $_POST['service_title']);
    $client_name = mysqli_real_escape_string($connection, $_POST['client_name']);
    $service_name = mysqli_real_escape_string($connection, $_POST['service_name']);
    $technology_name = mysqli_real_escape_string($connection, $_POST['technology_name']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $preview_link = $_POST['preview_link'];
    $status = $_POST['status'];
    $slug = trim(substr(md5($service_title), 0, 15) . time());


    if ($category_id == null){
        echo "<script>alert('Something went wrong.');
        window.history.back();
        </script>";
        exit;
    } elseif($service_title == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $service_title) || strlen($service_title) > 191){
        echo "<script>alert('Invalid input. Please ensure the service title is filled, contains only letters, numbers, spaces, ampersands (&) and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif($service_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $service_name) || strlen($service_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the service name is filled, contains only letters, numbers, spaces, ampersands (&) and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif($technology_name == null || !preg_match('/^[a-zA-Z0-9\s&]+$/', $technology_name) || strlen($technology_name) > 191){
        echo "<script>alert('Invalid input. Please ensure the technology name is filled, contains only letters, numbers, spaces, ampersands (&) and is less than 191 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif($content == null){
        echo "<script>alert('Invalid input. Please ensure the content is filled, contains only letters, numbers, spaces, ampersands (&), comma (,), point (.).');jk
        
        window.history.back();
        </script>";
        exit;
    } elseif(!filter_var($preview_link, FILTER_VALIDATE_URL) || strlen($technology_name) > 255){
        echo "<script>alert('Invalid input. Please ensure valid URL ans link length less then 255 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif ($status == null) {
        echo "<script>alert('Please select status field'); window.history.back();</script>";
    } else {
        $insertQuery = "INSERT INTO portfolio_item (portfolio_category_id, service_title, slug, client_name, service_name, Technologies, view_link, description, status) 
        VALUES ('$category_id', '$service_title', '$slug', '$client_name', '$service_name', '$technology_name', '$preview_link', '$content', '$status')";
        $insertQuery_run = mysqli_query($connection, $insertQuery);
    }


    if ($insertQuery_run) {
        $portfolio_item_id = $connection->insert_id;
        $multi_Image = $_FILES['image'];

        foreach ($multi_Image['name'] as $key => $item) {
            $extension = pathinfo($item, PATHINFO_EXTENSION);
            $time = date("hisa");
            $ImageName = substr(hash('sha256', $time . $item), 0, 10) . '.' . $extension;

            $insertQueryImg = "INSERT INTO portfolio_image (portfolio_item_id, image) VALUES ('$portfolio_item_id', '$ImageName')";
            $insertQueryImg_run = mysqli_query($connection, $insertQueryImg);

            if ($insertQueryImg_run) {
                $tmp_name = $multi_Image['tmp_name'][$key];
                $uploadPath = "../../upload/project_Img/" . $ImageName;

                if (move_uploaded_file($tmp_name, $uploadPath)) {
                    $_SESSION['success'] = "Inserted successfully done";
                    header('location: ../projects/project/index.php');
                } else {
                    $_SESSION['error'] = "File upload failed.";
                    header('location: ../projects/project/create.php');
                    exit;
                }
            } else {
                $_SESSION['error'] = "Database insert failed.";
                header('location: ../projects/project/create.php');
                exit;
            }
        }
    } else {
        $_SESSION['error'] = "Insert query failed.";
        header('location: ../projects/project/create.php');
    }

}



if (isset($_POST["updatebtn"])) {

    $id = $_POST['id'];
    $category_id = $_POST["category_id"];
    $service_title = mysqli_real_escape_string($connection, $_POST['service_title']);
    $client_name = mysqli_real_escape_string($connection, $_POST['client_name']);
    $service_name = mysqli_real_escape_string($connection, $_POST['service_name']);
    $technology_name = mysqli_real_escape_string($connection, $_POST['technology_name']);
    $content = mysqli_real_escape_string($connection, $_POST['content']);
    $preview_link = $_POST['preview_link'];
    $status = $_POST['status'];
    $slug = trim(substr(md5($service_title), 0, 15) . time());



    $updateQuery = "UPDATE portfolio_item SET portfolio_category_id = '$category_id', service_title = '$service_title', slug = '$slug', client_name = '$client_name',
         service_name = '$service_name', Technologies = '$technology_name', view_link = '$preview_link', description = '$content', status = '$status' WHERE ID = $id";

    $updateQuery_run = mysqli_query($connection, $updateQuery);


    if ($updateQuery_run) {
        if (isset($_FILES['image']) && !empty($_FILES['image']['name'][0])) {
            $multi_Image = $_FILES['image'];

            $exestingImg = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $id";
            $exestingImg_run = mysqli_query($connection, $exestingImg);
            $allData = mysqli_fetch_all($exestingImg_run, MYSQLI_ASSOC);

            foreach ($allData as $singleImg) {
                if (file_exists("../../upload/project_Img/" . $singleImg['image'])) {
                    unlink("../../upload/project_Img/" . $singleImg['image']);
                }

                $deleteQuery = "DELETE FROM portfolio_image WHERE ID = $singleImg[id]";
                $deleteQuery_run = mysqli_query($connection, $deleteQuery);

            }

            foreach ($multi_Image['name'] as $key => $item) {
                $extension = pathinfo($item, PATHINFO_EXTENSION);
                $time = date("hisa");
                $ImageName = substr(hash('sha256', $time . $item), 0, 10) . '.' . $extension;

                $insertQueryImg = "INSERT INTO portfolio_image (portfolio_item_id, image) VALUES ('$id', '$ImageName')";
                $insertQueryImg_run = mysqli_query($connection, $insertQueryImg);

                if ($insertQueryImg_run) {
                    $tmp_name = $multi_Image['tmp_name'][$key];
                    $uploadPath = "../../upload/project_Img/" . $ImageName;

                    if (move_uploaded_file($tmp_name, $uploadPath)) {
                        $_SESSION['success'] = "Update successfully done";
                        header('location: ../projects/project/index.php');
                    } else {
                        $_SESSION['error'] = "File Update Failed.";
                        header('location: ../projects/project/edit.php?id=' . $id);
                        exit;
                    }
                } else {
                    $_SESSION['error'] = "Database update failed.";
                    header('location: ../projects/project/edit.php?id=' . $id);
                    exit;
                }
            }
        } else {
            $_SESSION['success'] = "Update successfully done";
            header('location: ../projects/project/index.php');
        }

    } else {
        $_SESSION['error'] = "Update query failed.";
        header('location: ../projects/project/edit.php?id=' . $id);
    }

}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['delete_id'];

    $deleteItem = "DELETE FROM portfolio_item WHERE ID = $delete_id";

    $exestingImgAll = "SELECT * FROM portfolio_image WHERE portfolio_item_id = $delete_id";
    $exestingImgAll_run = mysqli_query($connection, $exestingImgAll);
    $allImage = mysqli_fetch_all($exestingImgAll_run, MYSQLI_ASSOC);

    foreach ($allImage as $singleImage) {
        if (file_exists("../../upload/project_Img/" . $singleImage['image'])) {
            unlink("../../upload/project_Img/" . $singleImage['image']);
        }

        $deleteImage = "DELETE FROM portfolio_image WHERE ID = $singleImage[id]";
        $deleteQuery_run = mysqli_query($connection, $deleteImage);

    }

    $deleteItem_run = mysqli_query($connection, $deleteItem);

    if ($deleteItem_run) {
        $_SESSION['success'] = "Delete successfully done";
        header('location: ../projects/project/index.php');
    } else {
        $_SESSION['error'] = "Delete Request Failed.";
        header('location: ../projects/project/index.php');
        exit;
    }

}