<?php

use malotor\ecommerce\Ecommerce;

class EcommerceTest extends PHPUnit_Framework_TestCase {

  protected $ecommerceManager;

  public function setUp() {
    $this->productMockup = $this->getMockBuilder('malotor\ecommerce\CartLineItemInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $this->productMockup->method('getReference')
      ->willReturn('PR1');
    $this->productMockup->method('getPrice')
      ->willReturn(20.3);

    //ProductDAO MockUP

    $this->productRepositoryMockup = $this->getMockBuilder('malotor\ecommerce\Adapters\ProductRepositoryInterface')
      ->getMock();
    $this->productRepositoryMockup->method('get')
      ->willReturn($this->productMockup);
    $this->productRepositoryMockup->method('save')
      ->willReturn($this->productMockup);

    $this->cartMockup = $this->getMock('malotor\ecommerce\Cart');

    $this->cartRepositoryMockup = $this->getMock('malotor\ecommerce\Adapters\CartRepositoryInterface');
    $this->cartRepositoryMockup->method('get')
      ->willReturn($this->cartMockup);


    $this->ecommerceManager = new Ecommerce($this->productRepositoryMockup, $this->cartRepositoryMockup);

  }

  public function testCreateNewEcommerceManager() {

    $this->assertInstanceOf('malotor\ecommerce\Ecommerce', $this->ecommerceManager);
  }


  public function testAddProductToCart() {

    $productID = 1;

    $this->productRepositoryMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->cartMockup->expects($this->once())
      ->method('addCartLine');


    $this->ecommerceManager->addProductToCart($productID, 1);

  }

  /*
  public function testGetTheProductFromDAO() {

    $productID = 1;

    $this->productRepositoryMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->ecommerceManager->addProductToCart($productID, 1);

  }

  public function testaddCartLineToCart() {

    $productID = 1;

    $this->productRepositoryMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->ecommerceManager->addProductToCart($productID, 1);

  }
  */

}