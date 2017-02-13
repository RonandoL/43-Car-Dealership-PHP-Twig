<?php
    class Car
    {
        private $make;
        private $model;
        private $year;
        private $color;
        private $price;
        private $image;

        function __construct($make, $model, $year, $color, $price, $image)
        {
            $this->make = $make;
            $this->model = $model;
            $this->year = $year;
            $this->color = $color;
            $this->price = $price;
            $this->image = $image;
        }

        // Standards
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

        // GETTERS
        function getMake()
        {
            return $this->make;
        }

        function getModel()
        {
            return $this->model;
        }

        function getYear()
        {
            return $this->year;
        }

        function getColor()
        {
            return $this->color;
        }

        function getPrice()
        {
            return $this->price;
        }

        function getImage()
        {
            return $this->image;
        }


    }

?>
