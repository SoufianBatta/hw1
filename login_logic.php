<?php
    include_once("Utils/DBManager.php");
    session_start();
    // Connessione al database
    if(isset($_SESSION['username']))
    {
        header('Location: homepage.php');
        exit;
    }
    if (isset($_POST['password']) && isset($_POST['username'])) {
        DBManager::init() or die(mysqli_connect_error());
        //storing variables in an array to fix them with mysqli_real_escape_string()
        $variables = array
        ( 
            'username' => $_POST['username'], 
            'password' => $_POST['password'] 
        );
        $escaped_variables = DBManager::prevent_injection($variables);
        $query = "SELECT * FROM utenti AS u WHERE u.Username = '". $escaped_variables['username']."' AND u.Password ='".$escaped_variables['password']."'";
        $result = DBManager::exe($query);
        $righe_result = DBManager::count($result);
        if ( $righe_result >= 1) {
            $_SESSION['username'] = $_POST['username'];
            header('Location: homepage.php');
            DBManager::close();
            exit;
        }
        else {
            $_SESSION['notfound'] = true;
            header('Location: login_view.php');
            DBManager::close();
            exit;
        }
    }
?>