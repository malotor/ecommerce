<?php

namespace malotor\ecommerce;

class CartLine implements CartLineInterface {

  protected $amount;
  protected $item;

  function __construct(CartLineItemInterface $cartLineItem, $quantity = 1) {
    $this->item = $cartLineItem;
    $this->quantity = $quantity;
  }

  public function getItem() {
    return $this->item;
  }

  public function getQuantity() {
    return $this->quantity;
  }

  /*
   * @todo Remove
   */

  public function getProductReference() {
    return $this->getItemReference();
  }

  /*
   * @todo check Demeter law
   */
  public function getItemReference() {
    return $this->getItem()->getReference();
  }

  public function lineCartAmount() {
    return $this->getQuantity() * $this->getItem()->getPrice();
  }

  /**
   * @deprecated Replace by increaseQuantity
   */
  public function increaseAmount($increment = 1) {
    $this->increaseQuantity($increment);
  }

  public function increaseQuantity($increment = 1) {
    $this->quantity += $increment;
  }

  public static function create(CartLineItemInterface $item, $quantity = 1) {
    return new static($item, $quantity);
  }

}