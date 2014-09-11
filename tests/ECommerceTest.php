<?php

use malotor\ecommerce\Product;
use malotor\ecommerce\Cart;

class ECommerceTest extends PHPUnit_Framework_TestCase {

  public function setUp() {
    $this->myProduct = new Product();

    $this->productName = "Mi producto";
    $this->productDesc = "Mi descripción";
    $this->productRef = "R2D2";
    $this->productPrice = 12.5;
    $this->productImage = "product_image.png";

    $this->myProduct->setName($this->productName)
      ->setDescription($this->productDesc)
      ->setReference($this->productRef)
      ->setPrice($this->productPrice)
      ->setImage($this->productImage);

  }

  //Product have fields name, description , ref , price, image
  public function testProduct()
  {

    $this->assertEquals($this->productName , $this->myProduct->getName());
    $this->assertEquals($this->productDesc, $this->myProduct->getDescription());
    $this->assertEquals($this->productRef , $this->myProduct->getReference());
    $this->assertEquals($this->productPrice , $this->myProduct->getPrice());
    $this->assertEquals($this->productImage , $this->myProduct->getImage());


  }

  //New card has 0 products
  public function testNewCart() {

    $myCart = new Cart();

    $this->assertEquals(0 , $myCart->countProducts());
  }

  //User can add products to their chart
  //Whem a product is added the number os products in cart increased
  public function testAddProductToCart() {

    $myCart = new Cart();

    $myCart->addProduct($this->myProduct);

    $this->assertEquals(1 , $myCart->countProducts());
  }

  
}