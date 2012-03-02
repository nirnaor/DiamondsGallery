<?php
/**
 * k
 * represent a single jewel.
 **/
class Jewel 
{
  var $name; 
  var $cut; 
  function __construct($name,$cut)
  {
    $this->name = $name;
    $this->cut = $cut;

  }

  function printDetails()
  {
    echo 'Name :' . $this->name;
  }
}

?>
