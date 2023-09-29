<?php 
    session_start();
    session_destroy();
    header('Location: /projeto/index.php')

?>