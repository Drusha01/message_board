<?php 
    session_start();
    include_once 'assets\database\database.php';
    if(isset($_SESSION['user_id'])){
        return header('location:user\messages');
    }else{
        return header('location:user\authentication\login');
    }
?>