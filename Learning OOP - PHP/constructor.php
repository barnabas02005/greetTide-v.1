<?php
class Bible {

      public $version;
      private $color;

      function __construct($version,$color)
      {
            $this->version = $version;
            $this->color = $color;
      }

      function get_version()
      {
            return $this->version;
      }

      function get_color()
      {
            return $this->color;
      }
}

$bible = new Bible("KJV","Black");
echo $bible->get_version();
echo "<br>";
echo $bible->get_color();
?>