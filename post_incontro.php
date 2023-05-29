<?php
    include_once("Utils/DBManager.php");
    session_start();
    DBManager::init() or die("Errore Avviamento Database ".mysqli_connect_error());
    $query = "";
    if (isset($_POST['Pokemon'])) {
        $variables = array();
            $variables['username'] = $_SESSION['username'];
            $variables['Pokemon'] = $_POST['Pokemon'];
            $variabiles_escaped = DBManager::prevent_injection($variables);
        if (!isset($_POST['catturato'])) {
            $query = "INSERT INTO INCONTRO(username,id_pokemon) VALUES('".$variabiles_escaped['username']."',".$variabiles_escaped['Pokemon'].")";
        }
        else {
            $query = "UPDATE INCONTRO SET catturato = 1 where id_pokemon = '".$variabiles_escaped['Pokemon']."' AND username = '".$variabiles_escaped['username']."'";
        }
        DBManager::exe($query);
    }
    
?>