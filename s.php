<?php
 //Controllo se sono stato reindirizzato dalla login
 session_start();
 if(!isset($_SESSION['username']))
     {
         header('Location: index.php');
         exit;
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Benvenuto Dentro al Sito!!</h1>
</body>
</html>