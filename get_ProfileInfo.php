<?php
    session_start();
    include_once('Utils/DBManager.php');
    DBManager::init() or die("Couldn't initialize DBManager <br>".mysqli_connect_error());
    $user = DBManager::prevent_injection(array('username' => $_SESSION['username']))['username'];
    $query = "SELECT * FROM UTENTI where UTENTI.username = '$user'";
    $result = DBManager::segregate(DBManager::exe($query));
    DBManager::close();
    echo (json_encode($result));

?>