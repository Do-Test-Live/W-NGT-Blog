<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();
date_default_timezone_set("Asia/Dhaka");

if(isset($_POST['add_blog'])){
    $blog_title = $db_handle->checkValue($_POST['blog_title']);
    $description = $db_handle->checkValue($_POST['description']);
    $meta_title = $db_handle->checkValue($_POST['meta_title']);
    $meta_description = $db_handle->checkValue($_POST['meta_description']);
    $meta_keywords = $db_handle->checkValue($_POST['meta_keywords']);
    $inserted_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");

    $image='';

    if (!empty($_FILES['image']['name'])){
        $RandomAccountNumber = mt_rand(1, 99999);
        $file_name = $RandomAccountNumber."_" . $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];

        $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        if (
            $file_type != "jpg" && $file_type != "png" && $file_type != "jpeg"
            && $file_type != "gif"
        ) {
            $attach_files = '';
        } else {
            move_uploaded_file($file_tmp, "../assets/images/blog/" .$file_name);
            $image = "assets/images/blog/" . $file_name;
        }
    }


    $insert = $db_handle->insertQuery("INSERT INTO `blog`( `title`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `image`, `inserted_at`, `updated_at`) VALUES ('$blog_title','$description','$meta_title','$meta_description','$meta_keywords','$image','$inserted_at','$updated_at')");


    if($insert){
        echo "<script>
                alert('Success');
                window.location.href='blog-details.php';
                </script>";
    }else{
        echo "<script>
                alert('Fail');
                window.location.href='blog-details.php+';
                </script>";
    }
}
