<?php
    for($i = 0; $i< 10; $i++){

        if($i == 4){
            continue;
        }

        echo "The number is : ". $i. '<br>'; // This line will not get executed for the numeber 4;
    }

?>