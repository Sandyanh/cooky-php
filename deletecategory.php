<?php
    ob_start();
    include 'connect.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE FROM `category` WHERE cat_id = $id";
        $conn->exec($sql);
    }
    header("Location: category.php");
?>