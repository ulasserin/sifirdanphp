<?php
        require_once "function.php";
        if($_SESSION['girisKontrol'] == 1) {
            
        }
        else{
            header("Location:index.php");
        }
        $id = $_GET['id'];
        $sql = "DELETE FROM `blog` WHERE `id` = ? ";
        $sil = $dbh->prepare($sql);
        $sil->execute([$id]);
        $message = $id. " 'li kayıt silindi";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Location:blog.php');

?>
