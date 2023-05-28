<?php
    include_once("Utils/DBManager.php");
    session_start();
    DBManager::init() or die(mysqli_connect_error());
    if (isset($_POST['fromForm'])) {
        $variables = array
        (
        'nome' => $_POST['nome'], 
        'cognome' => $_POST['cognome'], 
        'email' => $_POST['email'], 
        'telefono' => $_POST['telefono'], 
        'username' => $_POST['username'], 
        'password' => $_POST['password']
        );
        $_SESSION['Values'] = $variables;
        $escaped_variables = DBManager::prevent_injection($variables);
        //check if the username is already in the database
        $query_check_exist = "SELECT * FROM UTENTI WHERE UTENTI.USERNAME = '".$escaped_variables['username']."' OR UTENTI.EMAIL = '".$escaped_variables['email']."'";
        if (DBManager::count(DBManager::exe($query_check_exist)) === 0){
            $_SESSION['found']=false;
            $query =   "
            INSERT INTO Utenti(nome,cognome,email,telefono,username,password) 
            VALUES ('"
            .$escaped_variables['nome'].
            "','"
            .$escaped_variables['cognome'].
            "','"
            .$escaped_variables['email'].
            "','"
            .$escaped_variables['telefono'].
            "','"
            .$escaped_variables['username'].
            "','"
            .$escaped_variables['password']
            ."')
            ";
            $Status = DBManager::exe($query);
            $query_check = "SELECT * FROM UTENTI";
            $_SESSION['Users'] = DBManager::segregate(DBManager::exe($query_check));
            if ($Status) {
                $_SESSION['username'] = $escaped_variables['username'];
                unset($_SESSION['Values']);
                header('Location: homepage.php');
                exit;
            }
        }
        else{
            $_SESSION['found']=true;
        }  
    }
    header("Location: signin_view.php");
?>