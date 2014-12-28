<?php

use malotor\ecommerce\Cart;
use malotor\ecommerce\CartLine;


class CartTest extends PHPUnit_Framework_TestCase {


  public function setUp() {

    $this->product1 = $this->getMockBuilder('malotor\ecommerce\CartLineItemInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product1->method('getReference')
      ->willReturn('PR1');
    $this->product1->method('getPrice')
      ->willReturn(20.3);

    $this->product2 = $this->getMockBuilder('malotor\ecommerce\CartLineItemInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product2->method('getReference')
      ->willReturn('PR2');
    $this->product2->method('getPrice')
      ->willReturn(11);

    $this->myCart = new Cart();
  }

  public function testaddItemToCart() {

    
    $this->assertEquals(0 , $this->myCart->countItems());

    $this->myCart->addItem(CartLine::create($this->product1));

    $this->assertEquals(1 , $this->myCart->countItems());

    $this->myCart->addItem(CartLine::create($this->product2));

    $this->assertEquals(2 , $this->myCart->countItems());
  }



  public function testAddMoreThenOneItemFromAProduct() {

    $cartLine = CartLine::create($this->product1, 2);

    $this->myCart->addItem($cartLine);

    $this->assertEquals(1 , $this->myCart->countItems());

  }

  public function testRemoveAProductsByItsReference() {

    $this->myCart->addItem(CartLine::create($this->product1));

    $this->myCart->removeProduct('PR1');

    $this->assertEquals(0 , $this->myCart->countItems());

  }


  public function testTotalCostFromCartLines() {

    $this->myCart->addItem(CartLine::create($this->product1));

    $this->assertEquals(20.3 , $this->myCart->totalAmount());

    $this->myCart->addItem(CartLine::create($this->product2));

    $this->assertEquals(31.3 , $this->myCart->totalAmount());

  }


  public function testTotalCostFromProductsWithMultipleAmount() {

    $this->myCart->addItem(CartLine::create($this->product1, 2));

    $this->assertEquals(40.6 , $this->myCart->totalAmount());

  }

  public function testAddSeveralTimesTheSameProduct() {

    $this->myCart->addItem(CartLine::create($this->product1, 2));
    $this->myCart->addItem(CartLine::create($this->product1, 1));

    $this->assertEquals(1 , $this->myCart->countItems());

    $this->assertEquals(60.9 , $this->myCart->totalAmount());

  }

  public function testGetCartItem() {


    $product = $this->myCart->getCartItem(0);

    $this->assertEquals(null , $product);

  }


}