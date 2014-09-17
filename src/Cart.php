<?php

namespace malotor\ecommerce;

class Cart {

  protected $cartLines = array();

  function countProducts() {

    $numberOfProduct = 0;

    foreach ($this->cartLines as $cartLine)
      $numberOfProduct += $cartLine->getAmount();

    return $numberOfProduct;
  }

  function addProduct($cartLine) {

    $this->cartLines[] = $cartLine;

  }
}