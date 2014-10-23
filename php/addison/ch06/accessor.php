<?php
class C {
  public $attrs = array();

  public function __get($name) {
    echo "__get() is called.\n";
    return $this->attrs[$name];
  }

  public function __set($name, $value) {
    echo "__set() is called.\n";
    $this->attrs[$name] = $value;
  }
}

$obj = new C();
$obj->attr = 5;
echo $obj->attr . "\n";
