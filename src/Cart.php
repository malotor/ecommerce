<?php

namespace malotor\ecommerce;

class Cart implements CartInterface {

  protected $lineCarts;

  public function __construct() {
    $this->lineCarts = [];
  }

  public function countCartLines() {
    return count($this->lineCarts);
  }

  /*
   * @Todo change function name to addCartItem
   */
  public function addCartLine(CartLineInterface $newLineCart) {

    $flag = true;
    foreach ($this->lineCarts as $lineCart) {
      if ($newLineCart->getItemReference() == $lineCart->getItemReference()) {
        $lineCart->increaseAmount($newLineCart->getQuantity());
        $flag = false;
      }
    }
    //@Todo remove flag
    if ($flag)
      $this->lineCarts[] = $newLineCart;
  }

  public function removeCartLine($itemReference) {
    foreach ($this->lineCarts as $key => $lineCart) {
      if ($itemReference == $lineCart->getItemReference()) {
        unset($this->lineCarts[$key]);
      }
    }
  }

  public function totalAmount() {
    $result = 0;
    foreach ($this->lineCarts as $lineCart) {
      $result += $lineCart->lineCartAmount();
    }

    return $result;
  }

  public function getCartLines() {
    return $this->lineCarts;
  }

  public function getCartItem($index) {
    if (isset($this->lineCarts[$index]))
      return $this->lineCarts[$index];

    //@todo don´t return null
    return null;
  }

  public function getIterator() {
    /**
     * @todo Replace with
     * return new \ArrayIterator($this->lineCarts);
     */
    return new CartIterator($this);
  }
}