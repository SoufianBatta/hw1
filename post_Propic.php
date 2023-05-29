<?php
session_start();
include_once("Utils/DBManager.php");
DBManager::init() or die("Couldn't initialize DBManager <br>".mysqli_connect_error());
    $file = new CURLFile($_FILES['Propic']['tmp_name'],$_FILES['Propic']['type']);
    $token = "00043a24320673b4f5c42823951702d9";
    $data = array("key" => $token, "media" => $file);
    $file_curl = curl_init();
    curl_setopt($file_curl, CURLOPT_URL, "https://thumbsnap.com/api/upload");
    curl_setopt($file_curl, CURLOPT_POST, 1);
    curl_setopt($file_curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($file_curl, CURLOPT_RETURNTRANSFER, 1);
    $result = json_decode(curl_exec($file_curl),true);
    curl_close($file_curl);
    $propic = $result['data']['media'];
    $query = "UPDATE UTENTI SET UTENTI.propic = '".$propic."' WHERE utenti.username = '".$_SESSION['username']."'";
    DBManager::exe($query);
    DBManager::close();
?>