<?php
$var = "Hello php.";
function fn() {
  global $var;
  echo $var;
}

fn();
