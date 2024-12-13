<?php
    class bike{
        public $brand;

        public function __construct($brand){
            $this->brand = $brand;
        }

        public function get_brand(){
            return $this->brand; 
        }

    }


    $newBike = new bike("Ducati");

    echo "The new bike name is : ".$newBike->get_brand();
?>