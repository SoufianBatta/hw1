<?php
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
    <link rel="stylesheet" href="CSS/homepage.css">
    <script src="/hw1/Javascript/homepage.js" defer></script>
    <title>Homepage</title>
</head>
<body>
    <section id="header">
        <div>
            <h1>
                Benvenuto Dentro Al SocialDex
            </h1>
        </div>
    </section>
    <section id="content">
        <section id="profile">
            <div id="picture">
                <img>
                <input type="file" name="propic" value="CHANGE PROFILE PIC">
            </div>
            <div id="info">
                <span>Nome</span>
                <span>Cognome</span>
                <span>Email</span>
                <span>telefono</span>
            </div>
        </section>
        <section id="interface">
            <div ><a href="pokebattle_view.php">All'Avventura</a></div>
            <div ><a href="socialdex_view.php">socialdex</a></div>
            <div ><a href="logout.php">ESCI</a></div>
        </section>
    </section>
</body>
</html>