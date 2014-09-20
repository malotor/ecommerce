<?php

use malotor\ecommerce\Product;
use malotor\ecommerce\Cart;
use malotor\ecommerce\CartItem;

  class CartTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
      $this->product1 = new Product();
      $this->product1->setName("Product 1")
        ->setReference("PR1")
        ->setPrice(20.3);

      $this->product2 = new Product();
      $this->product2->setName("Product 2")
        ->setReference("PR2")
        ->setPrice(10);

    }

    //New card has 0 products
    //User can add products to their chart
    //Whem a product is added the number os products in cart increased
    public function testaddItemToCart() {

      $myCart = new Cart();
      $this->assertEquals(0 , $myCart->countProducts());

      $myCart->addItem(new CartItem($this->product1));

      $this->assertEquals(1 , $myCart->countProducts());

      $myCart->addItem(new CartItem($this->product2));

      $this->assertEquals(2 , $myCart->countProducts());
    }



    public function testAddMoreThenOneItemFromAProduct() {

      $myCart = new Cart();

      $cartLine = new CartItem($this->product1, 2);

      $myCart->addItem($cartLine);

      $this->assertEquals(1 , $myCart->countProducts());

    }

    public function testRemoveAProductsByItsReference() {
      $myCart = new Cart();

      $myCart->addItem(new CartItem($this->product1));

      $myCart->removeProduct('PR1');

      $this->assertEquals(0 , $myCart->countProducts());

    }

    public function testTotalCostFromCartLines() {


      $myCart = new Cart();

      $myCart->addItem(new CartItem($this->product1));

      $this->assertEquals(20.3 , $myCart->totalAmount());

      $myCart->addItem(new CartItem($this->product2));

      $this->assertEquals(30.3 , $myCart->totalAmount());

    }


    public function testTotalCostFromProductsWithMultipleAmount() {


      $myCart = new Cart();

      $myCart->addItem(new CartItem($this->product1, 2));

      $this->assertEquals(40.6 , $myCart->totalAmount());

    }

}