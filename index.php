<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <script src="script.js"></script>
    <title>Homepage</title>
</head>
<body>
    <?php 
    $variavil = 4;
    $batrest = 7;
    function somma($a,$b){
        return $a + $b;
    } 
    echo '<h1>' . somma($variavil,$batrest) . '</h1> <h2> la data di oggi e\' '. date("d-m-Y").'</h2>' ; 
    echo 'test';
    ?> 
</body>
</html>