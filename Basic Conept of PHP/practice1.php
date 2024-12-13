<?php
   $x = 5; //A global variable

    function my_text(){
        $y = 6; //local variable
        echo "The Global variable x = : ".$GLOBALS['x']; // printing a global variable

    }
    //can't access local variable outside the block or in this case outside the function.
   
    my_text();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Global and local variables</title>
</head>
<body>
    
</body>
</html>