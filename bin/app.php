<?php

require dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use malotor\package\myClass;

$myClassIntance = new myClass();

if ( $myClassIntance->myMethod() )
  echo "My method return TRUE" . PHP_EOL;
