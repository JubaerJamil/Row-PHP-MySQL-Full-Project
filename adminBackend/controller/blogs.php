<?php
session_start();
include '../../config/connection.php';

if (isset($_POST['savebtn'])) {
    $blog_titke = $_POST['blog_titke'];
    $content = trim($_POST['content'] ?? '');
    $subject = trim($_POST['subject'] ?? '');

    $Image = $_FILES['image']['name'];
    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if ($blog_titke == null || !preg_match('/^[a-zA-Z0-9\s,]+$/', $blog_titke) || strlen($blog_titke) > 255) {
        echo "<script>alert('Invalid input. Please ensure the blog title is filled, contains only letters, numbers, spaces, and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif ($content == null) {
        echo "<script>alert('Invalid input. Please ensure the blog title is filled.');
        window.history.back();
        </script>";
        exit;
    } elseif ($subject == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $subject) || strlen($subject) > 25) {
        echo "<script>alert('Invalid input. Please ensure the blog subject is filled, contains only letters, numbers, spaces, and is less than 25 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif ($Image == null) {
        echo "<script>alert('Invalid input. Please select product image.');
        window.history.back();
        </script>";
        exit;
    } elseif ($status == null || !preg_match('/^[0-9]+$/', $status)) {
        echo "<script>alert('Invalid input : Please ensure the status option is select.');
        window.history.back();
        </script>";
        exit;
    } else {

        $insertQuery = "INSERT INTO blogs (title, content, subject, image, status) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($insertQuery);
        $stmt->bind_param("ssssi", $blog_titke, $content, $subject, $ImageName, $status);

        if ($stmt->execute()) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/blog_img/" . $ImageName)) {
                $_SESSION['status'] = "Inserted successfully done";
                header('location: ../blog/index.php');
            } else {
                $_SESSION['failed'] = "File upload failed";
                header('location: ../blog/create.php');
            }
        } else {
            $_SESSION['failed'] = "Insertion failed: " . $stmt->error;
            header('location: ../blog/create.php');
        }
        $stmt->close();

    }

}



if (isset($_POST['editbtn'])) {
    $id = $_POST['id'];
    $old_image = $_POST['old_image'];
    $blog_titke = $_POST['blog_titke'];
    $content = trim($_POST['content'] ?? '');
    $subject = trim($_POST['subject'] ?? '');

    $Image = $_FILES['image']['name'];
    $extensin = pathinfo($Image, PATHINFO_EXTENSION);
    $time = date("h:i:sa");
    $ImageName = substr(md5($time . $Image), 0, 20) . '.' . $extensin;

    $status = $_POST['status'];

    if ($blog_titke == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $blog_titke) || strlen($blog_titke) > 255) {
        echo "<script>alert('Invalid input. Please ensure the blog title is filled, contains only letters, numbers, spaces, and is less than 255 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif ($content == null) {
        echo "<script>alert('Invalid input. Please ensure the blog title is filled.');
        window.history.back();
        </script>";
        exit;
    } elseif ($subject == null || !preg_match('/^[a-zA-Z0-9\s]+$/', $subject) || strlen($subject) > 25) {
        echo "<script>alert('Invalid input. Please ensure the blog subject is filled, contains only letters, numbers, spaces, and is less than 25 characters.');
        window.history.back();
        </script>";
        exit;
    } elseif ($status == null || !preg_match('/^[0-9]+$/', $status)) {
        echo "<script>alert('Invalid input : Please ensure the status option is select.');
        window.history.back();
        </script>";
        exit;
    } else {

        if ($Image != null) {
            $updateImage = $ImageName;
        } else {
            $updateImage = $old_image;
        }

        $editQuery = "UPDATE blogs 
              SET title = ?, content = ?, subject = ?, image = ?, status = ? 
              WHERE id = ?";
        $stmt = $connection->prepare($editQuery);

        $stmt->bind_param("ssssii", $blog_titke, $content, $subject, $updateImage, $status, $id);

        if ($stmt->execute()) {

            if (!empty($_FILES['image']['tmp_name'])) {
                if (move_uploaded_file($_FILES['image']['tmp_name'], "../../upload/blog_img/" . $updateImage)) {
                    if (file_exists('../../upload/blog_img/' . $old_image)) {
                        unlink('../../upload/blog_img/' . $old_image);
                    }
                } else {
                    $_SESSION['failed'] = "Image upload failed";
                    header('location: ../blog/edit.php');
                    exit;
                }
            }

            $_SESSION['success'] = "Update successfully done";
            header('location: ../blog/index.php');
        } else {
            $_SESSION['failed'] = "Update failed: " . $stmt->error;
            header('location: ../blog/edit.php');
        }
        $stmt->close();

    }

}


if (isset($_POST['deleteBtn'])) {
    $delete_id = $_POST['delete_id'];
    $image = $_POST['image'];

    $delete_query = "DELETE FROM blogs WHERE id= $delete_id";
    $delete_query_run = mysqli_query($connection, $delete_query);

    if ($delete_query_run) {
        unlink('../../upload/blog_img/' . $image);
        $_SESSION['status'] = "Delete successfully done!";
        header('location: ../blog/index.php');
    } else {
        $_SESSION['failed'] = "Delete Failed";
        header('location: ../blog/index.php');
    }
}