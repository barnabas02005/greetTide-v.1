<?php
class Laptop {

      // Properties of 'Laptop' class
      public $name;
      public $color;

      // Methods

      // Setting and getting name property
      function set_name($name)
      {
            $this->name = $name;
      }

      function get_name()
      {
            return $this->name;
      }

      // Setting and getting the color property
      function set_color($color)
      {
            $this->color = $color;
      }

      function get_color()
      {
            return $this->color;
      }

}

$Hp = new Laptop();
$Dell = new Laptop();

$Hp->set_name("Hp 15");
$Hp->set_color("Red");
$Dell->set_name("Dell latitude");
$Dell->set_color("Black");

echo $Hp->get_name();
echo "<br>";
echo $Hp->get_color();
echo "<br>";
echo $Dell->get_name();
echo "<br>";
echo $Dell->get_color();
?>