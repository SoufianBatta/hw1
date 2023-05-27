<?php
    include_once("Utils/Paths.php");
    session_start();
    session_destroy();
    header('Location: '.getPath("index.php"));
    exit();
?>