<?php

namespace malotor\ecommerce;

class Cart  {

  protected $lineCarts;

  public function __construct() {
    $this->lineCarts = array();
  }

  public function countProducts() {
    return count($this->lineCarts);
  }

  public function addProduct($cartLine) {
    $this->lineCarts[ $cartLine->getProductReference() ]=$cartLine;
  }

  public function removeProduct($productReference) {
    unset($this->lineCarts[$productReference]);
  }

  public function totalAmount() {
    $result = 0;
    foreach ($this->lineCarts as $lineCart) {
      $productPrice = $lineCart->getProductPrice();
      $result += $lineCart->getAmount() * $lineCart->getProductPrice();
    }
    return $result;
  }
}