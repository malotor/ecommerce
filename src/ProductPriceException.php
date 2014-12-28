<?php

namespace malotor\ecommerce;

class ProductPriceException extends \Exception {
  public function __construct($message = null, $code = 0, Exception $previous = null) {
    $message = 'Product price must be numeric';
    parent::__construct($message, $code, $previous);
  }
}