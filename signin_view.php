<?php
session_start();
if (isset($_SESSION['Values'])) {
    $variables = $_SESSION['Values'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/signin.css">
    <script src="Javascript/signin.js" defer></script>
    <title>Signin</title>
</head>
<body>
    <div id="Content">
    <form method='post' name='signin' id="signin" action="signin_logic.php">
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
    </div>
    <?php
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