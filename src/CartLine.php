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

  function __construct($product, $amount = 1) {
    $this->product = $product;
    $this->amount = $amount;
  }


  public function getProductReference() {

    return $this->product->getReference();
  }

  public function getProductPrice() {
    return $this->product->getReference();
  }

}