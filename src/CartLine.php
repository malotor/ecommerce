<?php

namespace malotor\ecommerce;

class CartLine {

  protected $amount;
  protected $product;

  /**
   * @return mixed
   */
  public function getAmount() {
    return $this->amount;
  }

  /**
   * @return mixed
   */
  public function getProduct() {
    return $this->product;
  }



  function __construct($product, $amount) {
    $this->product = $product;
    $this->amount = $amount;
  }
}