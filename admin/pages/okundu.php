<?php
    require_once 'function.php';
    $id = $_GET['id'];
    $sql = "UPDATE iletisim SET okundu = 0 WHERE id =?";
    $aktifet = $dbh->prepare($sql);
    $aktifet->execute(array($id));
    header('location:mesaj.php');

?>