<?php
    class Car
    {
        private $make;
        // private $model;
        // private $year;
        // private $color;
        // private $price;
        // private $image;

        function __construct($make)
        {
            $this->make = $make;
        }

        function getMake()
        {
            return $this->$make;
        }

        function save()
        {
            array_push($_SESSION['list_of_cars'], $this);
        }

        static function getAll()
        {
            return $_SESSION['list_of_cars'];
        }

        static function deleteAll()
        {
            $_SESSION['list_of_cars'] = array();
        }




    }

?>
