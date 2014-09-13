<?php

use malotor\ecommerce\Product;
use malotor\ecommerce\Cart;

class CartTest extends PHPUnit_Framework_TestCase {

  public function setUp() {

    $this->product1 = $this->getMockBuilder('Product')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product1->expects($this->any())->method('getPrice')->will($this->returnValue(40));
    $this->product1->expects($this->any())->method('getName')->will($this->returnValue('My product'));

    $this->product2 = $this->getMockBuilder('Product')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product1->expects($this->any())->method('getPrice')->will($this->returnValue(12.3));
    $this->product1->expects($this->any())->method('getName')->will($this->returnValue('My second product'));


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