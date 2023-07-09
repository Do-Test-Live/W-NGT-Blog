<?php
session_start();
require_once("../include/dbController.php");
$db_handle = new DBController();

if (isset($_GET['blog_id'])) {

    $data = $db_handle->runQuery("select * FROM `blog` WHERE id='{$_GET['blog_id']}'");
    unlink('../' . $data[0]['image']);

    $db_handle->insertQuery("delete from blog where id=" . $_GET['blog_id'] . "");
    echo 'success';
}
