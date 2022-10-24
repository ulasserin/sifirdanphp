<?php
    session_start();
    if($_SESSION['girisKontrol'] == 1) {

    }
    else{
        header("Location:index.php");
    }
    require_once 'function.php';
    $id= $_GET['id'];
    $sql = "DELETE FROM iletisim WHERE id = ?";
    $mesajSil = $dbh->prepare($sql);
    $mesajSil->execute(array($id));
    header('Location:mesaj.php');

?>