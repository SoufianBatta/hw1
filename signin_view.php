<?php
include_once("Utils/Paths.php");
session_start();
if (isset($_SESSION['Values'])) {
    $variables = $_SESSION['Values'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo getPath("signin.css","CSS") ;?>>
    <script src=<?php echo getPath("signin.js","Javascript") ;?> defer></script>
    <title>Signin</title>
</head>
<body>
    <form method='post' name='signin' action=<?php echo getPath("signin_logic.php") ;?>>
        <label for="name">
            Nome 
            <input type='text' name = 'nome' placeholder='Inserire il nome' <?php $value = (isset($variables)) ? "value='".$variables['nome']."'" : ""; echo $value;?>>
            <div class='hidden error'>Inserire il Nome</div>
        </label>
        <label>
            Cognome 
            <input type='text' name = 'cognome' placeholder='Inserire il cognome' <?php $value =(isset($variables)) ?  "value='".$variables['cognome']."'" : ""; echo $value;?>>
            <div class='hidden error'>inserire il Cognome</div>
        </label>
        <label>
            Email 
            <input type='text' name = 'email' placeholder='Inserire la mail' <?php $value = (isset($variables)) ? "value='".$variables['email']."'" : ""; echo $value;?>>
            <div class='hidden error' id='email'>Inserire un'e-mail</div>
        </label>
        <label>
            Telefono 
            <input type='text' name = 'telefono' placeholder='Inserire il numero di telefono' <?php $value =(isset($variables)) ?  "value='".$variables['telefono']."'" : ""; echo $value;?>>
            <div class='hidden error'>inserire un numero di telefono</div>
        </label>
        <label>
            Username 
            <input type='text' name = 'username' placeholder='Inserire il tuo username' <?php $value = (isset($variables)) ? "value='".$variables['username']."'" : ""; echo $value;?>>
            <div class='hidden error'>inserire un Username</div>
        </label>
        <label>
            Password 
            <input type='password' name = 'password' placeholder='Inserire la password' <?php $value = (isset($variables)) ?  "value='".$variables['password']."'" : ""; echo $value;?>>
            <div class='hidden error'>Inserire una Password</div>
        </label>
        <input type='submit' name='invio' value='Invia'>
    </form>
    <?php
    if (isset($_SESSION['Users'])) {
        $Users = $_SESSION['Users'];
        print_r($Users);
    }
    if (isset($_SESSION['found']) && $_SESSION['found']) {
        echo '<br>';
        echo "<div class='error'>ATTENZIONE USERNAME O EMAIL GIA PRESENTI</div>";
    }
    ?>
</body>
</html>
<?php
    unset($_SESSION['Values']);
    unset($_SESSION['found']);
?>