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

  public function addItem($cartLine) {
    $this->lineCarts[ $cartLine->getProductReference() ]=$cartLine;
  }

  public function removeProduct($productReference) {
    unset($this->lineCarts[$productReference]);
  }

  public function lineCartAmount($lineCart) {
    return $lineCart->getAmount() * $lineCart->getProductPrice();
  }

  public function totalAmount() {
    $result = 0;
    foreach ($this->lineCarts as $lineCart) {
      $result += $this->lineCartAmount($lineCart);
    }
    return $result;
  }
}