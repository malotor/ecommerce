<?php

use malotor\ecommerce\ProductFactory;

class ProductFactoryTest extends PHPUnit_Framework_TestCase {

  public function setUp() {

  }

  public function testFactoryCreateProducts() {
    $newProduct = ProductFactory::createProduct('My new product','PR1','Product Description',20.3);
    $this->assertInstanceOf('malotor\ecommerce\Product', $newProduct);
  }

  public function testFactoryCreateConcreteProducts() {
    $newProduct = ProductFactory::createProduct('My new product','PR1','Product Description',20.3);
    $this->assertEquals('My new product', $newProduct->getName());
    $this->assertEquals('Product Description', $newProduct->getDescription());
    $this->assertEquals('PR1', $newProduct->getReference());
    $this->assertEquals(20.3, $newProduct->getPrice());
  }

}