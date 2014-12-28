<?php

use malotor\ecommerce\Order;

use malotor\ecommerce\CartLine;

class OrderTest extends PHPUnit_Framework_TestCase {

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

    $this->now = time();

    $this->order = new Order();
  }


  public function testaddItemToOrder() {

    $this->assertEquals(0, $this->order->countItems());

    $this->order->addItem(CartLine::create($this->product1));

    $this->assertEquals(1, $this->order->countItems());

    $this->order->addItem(CartLine::create($this->product2));

    $this->assertEquals(2, $this->order->countItems());

  }


  public function testAddMoreThenOneItemFromAProduct() {

    $this->order->addItem(CartLine::create($this->product1, 2));

    $this->assertEquals(1, $this->order->countItems());

  }

  public function testTotalCostFromCartLines() {

    $this->assertEquals(0, $this->order->totalAmount());

    $this->order->addItem(CartLine::create($this->product1));

    $this->assertEquals(20.3, $this->order->totalAmount());

    $this->order->addItem(CartLine::create($this->product2));

    $this->assertEquals(31.3, $this->order->totalAmount());

  }

  public function testOrderCreationDate() {
    $this->assertEquals($this->now, $this->order->getCreationDate());
  }

}