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
    return array(
      'name' => 'Ecommerce Unit Test',
      'description' => 'Ecommerce Unit Test',
      'group' => 'Ecommerce',
    );
  }

  public function setUp() {

    //parent::initContainer();

    $this->productMockup = $this->getMockBuilder('malotor\ecommerce\ProductInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $this->productMockup->method('getReference')
      ->willReturn('PR1');
    $this->productMockup->method('getPrice')
      ->willReturn(20.3);

    //ProductDAO MockUP
    $this->productDAOMockup = $this->getMockBuilder('malotor\ecommerce\ProductDAO')
      ->getMock();
    $this->productDAOMockup->method('get')
      ->willReturn($this->productMockup);
    $this->productDAOMockup->method('save')
      ->willReturn(true);


    //var_dump($this->productDAOMockup);
    //CartDAO MockUP
    $cartMockup = $this->getMock('malotor\ecommerce\CartInterface');

    $this->cartDAOMockup = $this->getMock('malotor\ecommerce\CartDAOInterface');
    $this->cartDAOMockup->method('get')
      ->willReturn($cartMockup);


    $this->ecommerceManager = new EcommerceManager($this->productDAOMockup, $this->cartDAOMockup);

    //parent::setContainer();
  }

  public function testCreateNewEcommerceManager() {
    $this->assertInstanceOf('malotor\ecommerce\EcommerceManager', $this->ecommerceManager);
  }

  public function testAddProductToCart() {

    $productID = 1;
    /*
    $this->productDAOMockup->expects($this->once())
      ->method('get')
      ->with($this->equalTo($productID));

    $this->cartMockup->expects($this->once())
      ->method('addItem')
      ->with($this->equalTo($this->productMockup));
    */

    $this->ecommerceManager->addProductToCart($productID);

  }

}