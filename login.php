<?php
    include_once("Utils/Paths.php");
    include_once(getPath("DBManager.php","Utils"));
    session_start();
    // Connessione al database
        if(isset($_SESSION['username']))
        {
            header('Location: '.getPath("Homepage.php"));
            exit;
        }
    if (isset($_POST['password']) && isset($_POST['username'])) {
        DBManager::init() or die(mysqli_connect_error());
        $variables = array( 'username' => $_POST['username'], 'password' => $_POST['password'] );
        $escaped_variables = DBManager::prevent_injection($variables);
        $query = "SELECT * FROM utenti AS u WHERE u.Username = '". $escaped_variables['username']."' AND u.Password ='".$escaped_variables['password']."'";
        $result = DBManager::exe($query);
        $righe_result = Dbmanager::count($result);
        if ( $righe_result >= 1) {
            $_SESSION['username'] = $_POST['username'];
            header('Location: '.getPath("Homepage.php"));
            exit;
        }
        else {
            $muori = true;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo getPath("login.css","CSS")?>>
    <title>Login</title>
</head>
<body>
    <?php
    if (isset($muori)) {
        echo "<div class='error'>";
        echo "Attenzione Utente non Riconosciuto";
        echo "</div>";
    }
    print_r($escaped_variables);
    ?>
    <form method='POST'>
    <span><label>Password<input type="password" name="password"></label></span>
    <span><label>Username<input type="text" name="username"></label></span>
    <input type="submit" value="Invia Dati">
    </form>
</body>
</html>