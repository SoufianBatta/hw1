<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Monomaniac+One&display=swap" rel="stylesheet">
    <title>Index</title>
</head>
<body>
    <section class="init" id="header">
        <div id="header_content">
            <div id="header_title">
                Benvenuto nel mondo Del SocialDex
            </div>
        </div>
    </section>
    <section class="init" id="content">
        <div id="main_content">
            <div class="preview">
                <p>
                    Qui Potrai Catturare tutti i tuoi Pokemon preferiti ti bastera superare delle sfide per poi scoprire quale pokemon hai catturato
                </p>
                <img src="Images/Index/test.webp">
            </div>
            <div class="preview">
               <img src="Images/Index/catchemall.webp">
               <p>
                    Mostra a tutti i Pokemon che hai catturato, pubblica nella tua bacheca i pokemon piu' belli e vantati di essere un allenatore micidiale!
                </p>
            </div>
            <div class="preview">
                <p>
                    potrai cercare nel tuo personale SocialDex tutti i pokemon che hai catturato e le loro caratteristiche
                </p>
                <img src="Images/Index/pokedex.jpg">
            </div>
        </div>
        <div class="init" id="buttons">
            <a href="login_view.php">Accedi</a>
            <a href="signin_view.php">Iscriviti</a>
        </div>
    </section>
</body>
</html>