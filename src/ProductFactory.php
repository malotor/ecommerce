<?php

namespace malotor\ecommerce;

class ProductFactory {

  public static function createProduct($productName,$productRef,$productDescription,$productPrice) {
    $product = new Product();

    $product->setName($productName)
      ->setReference($productRef)
      ->setDescription($productDescription)
      ->setPrice($productPrice);

    return $product;
  }

}