<?php 

    $_SESSION['girisKontrol'] = 0;

    foreach($_SESSION as $session_item):
        unset($_SESSION[$session_item]);
    endforeach;
    
    session_destroy();
    header('Location:index.php');

?>