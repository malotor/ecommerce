<?php

use malotor\ecommerce\CartLine;


/**
 * @ingroup Ecommerce
 * @group Ecommerce
 */

class CartLineTest extends PHPUnit_Framework_TestCase {

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => 'Ecommerce Unit Test',
      'description' => 'Ecommerce Unit Test',
      'group' => 'Ecommerce',
    );
  }

  public function setUp() {

    $this->product1 = $this->getMockBuilder('malotor\ecommerce\CartLineItemInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $this->product1->method('getReference')
      ->willReturn('PR1');
    $this->product1->method('getPrice')
      ->willReturn(20.3);

    $this->myCartItem = new CartLine($this->product1);

  }

  public function testGetProductReference() {
    $this->assertEquals("PR1" , $this->myCartItem->getProductReference());
  }
  public function testGetTotalItemAmount() {
    $this->assertEquals(20.3 , $this->myCartItem->lineCartAmount());
  }

  public function testIncreaseAmount() {
    $this->myCartItem->increaseAmount();
    $this->assertEquals(40.6 ,  $this->myCartItem->lineCartAmount());
    $this->myCartItem->increaseAmount(2);
    $this->assertEquals(81.2 ,  $this->myCartItem->lineCartAmount());
  }

  public function testGetQuantity() {
    $this->assertEquals(1 ,  $this->myCartItem->getQuantity());
    $this->myCartItem->increaseAmount();
    $this->assertEquals(2 ,  $this->myCartItem->getQuantity());
  }

  public function testStaticMethod() {
    $this->assertInstanceOf('malotor\ecommerce\CartLine', CartLine::create($this->product1));
  }




}