<?php
session_start();
include '../../config/connection.php';

if(isset($_POST['comtBtn'])){

    $postId = trim($_POST['postId'] ?? '');
    $comment = trim($_POST['comment']?? '');

    if($postId == null){
        echo "<script>alert('Something went worng!');
        window.history.back();
        </script>";
        exit;
    }elseif($comment == null){
        echo "<script>alert('Write something.');
        window.history.back();
        </script>";
        exit;
    }else{
        $commentInsert = "INSERT INTO comments (post_id, comment) VALUE ('$postId', '$comment')";
        $commentInsert_run = mysqli_query($connection, $commentInsert);

        if($commentInsert_run){
            $_SESSION['success'] = "Thanks for comment";
            header('location: ../../blog_details.php?id='.$postId);
        }else{
            $_SESSION['failed'] = "Comment submit failed!";
            header('location: ../../blog_details.php?id='.$postId);
        }
    }
}


if(isset($_POST['deleteBtn'])){
    $id = $_POST['delete_id'];
    $post_id = $_POST['post_id'];
    $deleteQuery = "DELETE FROM comments  WHERE id = $id;";
    $delete_query_run = mysqli_query($connection, $deleteQuery);

    if ($delete_query_run) {
        $_SESSION['success'] = "Delete successfully done!";
        header('location: ../blog/show.php?id='.$post_id );
    } else {
        $_SESSION['failed'] = "Delete Failed";
        header('location: ../blog/show.php?id='.$post_id );
    }

}