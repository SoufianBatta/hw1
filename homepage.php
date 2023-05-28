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
    <form name="poke" id="poke">
        <label for="poke">Pokemon: </label>
        <input type="text" name="poke" placeholder="inserire il nome del pokemon">
        <input type="submit" value="cerca Pokemon">
    </form>
    <div id="Pokemon">
        <img src="">
    </div>
</body>
</html>