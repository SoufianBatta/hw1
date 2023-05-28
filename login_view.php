<?php
include_once("Utils/DBManager.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <script src="/hw1/Javascript/login.js" defer></script>
    <title>Login</title>
</head>
<body>
    <div id="Content">
        <form method='POST' name="login" id="login" action="login_logic.php">
            <span><label>Username<input type="text" name="username"></label></span>
            <span><label>Password<input type="password" name="password"></label></span>
            <input type="submit" value="Accedi">
        </form>
        <div id="sign">
            Non sei ancora Registrato? <a href="signin_view.php">Registrati Ora</a>
        </div>
        <?php
        if (isset($_SESSION['notfound'])) {
            echo 
            "
            <div class='error'>
            <h3>Errore, Utente non riconosciuto</h3>
            </div>
            ";
            unset($_SESSION['notfound']);
        }
        ?>
    </div>

</body>
</html>