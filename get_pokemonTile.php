<?php
include_once("Utils/DBManager.php");
session_start();
DBManager::init() or die("DBManager error: " . mysqli_connect_error());
$Query = "Select incontro.catturato, pokemon.* FROM pokemon INNER JOIN incontro ON incontro.id_pokemon = pokemon.id WHERE incontro.username = '".$_SESSION['username']."'";
$result = DBManager::segregate(DBManager::exe(@$Query));
print_r(json_encode($result));
?>