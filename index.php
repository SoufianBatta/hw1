<?php
session_start();
include_once('Utils/Paths.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?php echo getPath("index.css","CSS") ;?>>
    <script src=<?php echo getPath("") ;?> defer></script>
    <title>Index</title>
</head>
<body>
    <div id="header">

    </div>
    <a href=<?php echo getPath('login.php')?>>Accedi</a>
    <a href=<?php echo getPath("signin_view.php")?>>Iscriviti</a>
</body>
</html>