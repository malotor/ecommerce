<?php


namespace malotor\ecommerce;

interface CartInterface {

  public function countCartLines();

  public function addCartLine(CartLineInterface $newLineCart);

  public function removeCartLine($productReference);

  public function totalAmount();

  public function getCartLines();

  /*
   * @todo rename to getCartLine
   */
  public function getCartItem($position);
}