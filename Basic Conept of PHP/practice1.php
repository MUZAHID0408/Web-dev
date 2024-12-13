<?php
   $x = 5; //A global variable

    function my_text(){
        echo "The Global variable x = : ".$GLOBALS['x']; // printing a global variable

    }
   
    my_text();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>