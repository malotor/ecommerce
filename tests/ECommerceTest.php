<?php

use malotor\ecommerce\Product;

class ECommerceTest extends PHPUnit_Framework_TestCase {


  public function testProduct()
  {

    $myProduct = new Product();

    $productName = "Mi producto";
    $productDesc = "Mi descripción";
    $productRef = "R2D2";
    $productPrice = 12.5;
    $productImage = "product_image.png";

    $myProduct->setName($productName)
    ->setDescription($productDesc)
    ->setReference($productRef)
    ->setPrice($productPrice)
    ->setImage($productImage);

    $this->assertEquals($productName , $myProduct->getName());
    $this->assertEquals($productDesc, $myProduct->getDescription());
    $this->assertEquals($productRef , $myProduct->getReference());
    $this->assertEquals($productPrice , $myProduct->getPrice());
    $this->assertEquals($productImage , $myProduct->getImage());


  }

}