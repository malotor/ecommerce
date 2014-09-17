<?php

use malotor\ecommerce\Product;
use malotor\ecommerce\Cart;
use malotor\ecommerce\CartLine;

class CartTest extends PHPUnit_Framework_TestCase {

  public function setUp() {

    $this->product1 = $this->getMockBuilder('Product')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product1->expects($this->any())->method('getPrice')->will($this->returnValue(40));
    $this->product1->expects($this->any())->method('getName')->will($this->returnValue('My product'));
    $this->product1->expects($this->any())->method('getReference')->will($this->returnValue('product'));

    $this->product2 = $this->getMockBuilder('Product')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product2->expects($this->any())->method('getPrice')->will($this->returnValue(12.3));
    $this->product2->expects($this->any())->method('getName')->will($this->returnValue('My second product'));
    $this->product2->expects($this->any())->method('getReference')->will($this->returnValue('product2'));

  }

  //New card has 0 products
  //User can add products to their chart
  //Whem a product is added the number os products in cart increased
  public function testAddProductToCart() {

    $myCart = new Cart();
    $this->assertEquals(0 , $myCart->countProducts());

    $myCart->addProduct(new CartLine($this->product1));

    $this->assertEquals(1 , $myCart->countProducts());

    $myCart->addProduct(new CartLine($this->product2));

    $this->assertEquals(2 , $myCart->countProducts());
  }



  public function testAddMoreThenOneItemFromAProduct() {

    $myCart = new Cart();

    $cartLine = new CartLine($this->product1, 2);

    $myCart->addProduct($cartLine);

    $this->assertEquals(2 , $myCart->countProducts());

  }

  public function testRemoveAProductsByItsReference() {


  }

}