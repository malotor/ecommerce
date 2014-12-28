<?php

use malotor\ecommerce\CartDAO;
use malotor\ecommerce\EcommerceManager;
use malotor\ecommerce\ProductDAO;

class EcommerceManagerTest extends PHPUnit_Framework_TestCase {

  protected $ecommerceManager;

  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name'        => 'Ecommerce Unit Test',
      'description' => 'Ecommerce Unit Test',
      'group'       => 'Ecommerce',
    ];
  }

  public function setUp() {
    $this->productMockup = $this->getMockBuilder('malotor\ecommerce\CartLineItemInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $this->productMockup->method('getReference')
      ->willReturn('PR1');
    $this->productMockup->method('getPrice')
      ->willReturn(20.3);

    //ProductDAO MockUP

    $this->productDAOMockup = $this->getMockBuilder('malotor\ecommerce\ProductDAOInterface')
      ->getMock();
    $this->productDAOMockup->method('get')
      ->willReturn($this->productMockup);
    $this->productDAOMockup->method('save')
      ->willReturn($this->productMockup);

    $this->cartMockup = $this->getMock('malotor\ecommerce\Cart');

    $this->cartDAOMockup = $this->getMock('malotor\ecommerce\CartDAOInterface');
    $this->cartDAOMockup->method('get')
      ->willReturn($this->cartMockup);


    $this->ecommerceManager = new EcommerceManager($this->productDAOMockup, $this->cartDAOMockup);

  }

  public function testCreateNewEcommerceManager() {

    $this->assertInstanceOf('malotor\ecommerce\EcommerceManager', $this->ecommerceManager);
  }

  public function testAddProductToCart() {

    $productID = 1;

    $this->productDAOMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->cartMockup->expects($this->once())
      ->method('addItem');


    $this->ecommerceManager->addProductToCart($productID, 1);

  }

  public function testGetTheProductFromDAO() {

    $productID = 1;

    $this->productDAOMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->ecommerceManager->addProductToCart($productID, 1);

  }

  public function testAddItemToCart() {

    $productID = 1;

    $this->productDAOMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->ecommerceManager->addProductToCart($productID, 1);

  }

}