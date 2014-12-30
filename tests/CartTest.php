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

  public function testaddCartLineToCart() {


    $this->assertEquals(0, $this->myCart->countCartLines());

    $this->myCart->addCartLine(CartLine::create($this->product1));

    $this->assertEquals(1, $this->myCart->countCartLines());

    $this->myCart->addCartLine(CartLine::create($this->product2));

    $this->assertEquals(2, $this->myCart->countCartLines());
  }


  public function testAddMoreThenOneItemFromAProduct() {

    $cartLine = CartLine::create($this->product1, 2);

    $this->myCart->addCartLine($cartLine);

    $this->assertEquals(1, $this->myCart->countCartLines());

  }

  public function testRemoveAProductsByItsReference() {

    $this->myCart->addCartLine(CartLine::create($this->product1));

    $this->myCart->removeCartLine('PR1');

    $this->assertEquals(0, $this->myCart->countCartLines());

  }


  public function testTotalCostFromCartLines() {

    $this->myCart->addCartLine(CartLine::create($this->product1));

    $this->assertEquals(20.3, $this->myCart->totalAmount());

    $this->myCart->addCartLine(CartLine::create($this->product2));

    $this->assertEquals(31.3, $this->myCart->totalAmount());

  }


  public function testTotalCostFromProductsWithMultipleAmount() {

    $this->myCart->addCartLine(CartLine::create($this->product1, 2));

    $this->assertEquals(40.6, $this->myCart->totalAmount());

  }

  public function testAddSeveralTimesTheSameProduct() {

    $this->myCart->addCartLine(CartLine::create($this->product1, 2));
    $this->myCart->addCartLine(CartLine::create($this->product1, 1));

    $this->assertEquals(1, $this->myCart->countCartLines());

    $this->assertEquals(60.9, $this->myCart->totalAmount());

  }

  public function testGetCartItem() {


    $product = $this->myCart->getCartItem(0);

    $this->assertEquals(null, $product);

  }

}