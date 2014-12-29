<?php


namespace malotor\ecommerce;

interface CartInterface {

  public function countCartLines();

  /*
   * @Todo change function name to addCartItem
   */
  public function addCartLine(CartLineInterface $newLineCart);

  /*
   * @Todo change function name to removeCartItem
   */
  public function removeCartLine($productReference);

  public function totalAmount();

  public function getCartLines();

  public function getCartItem($position);
}