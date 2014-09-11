<?php

namespace malotor\ecommerce;

class Cart {

  protected $products = array();

  function countProducts() {
    return count($this->products);
  }

  function addProduct($product) {
    $this->products[] = $product;
  }
}