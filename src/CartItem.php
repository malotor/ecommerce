<?php

namespace malotor\ecommerce;

class CartItem {

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
    return $this->product->getPrice();
  }

  public static function create($product, $amount = 1) {
    return new static($product, $amount);
  }

}