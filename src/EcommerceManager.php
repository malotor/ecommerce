<?php

namespace malotor\ecommerce;

class EcommerceManager  {

  protected $productDAO;
  protected $cartDAO;

  public function __construct(ProductDAOInterface $productDAO, CartDAOInterface $cartDAO) {
    $this->productDAO = $productDAO;
    $this->cartDAO = $cartDAO;
  }

  public function addProductToCart($productId, $quantity) {
    $product = $this->productDAO->get($productId);
    $shoppingCart = $this->cartDAO->get();
    $shoppingCart->addItem(CartLine::create($product, $quantity));
    $this->cartDAO->save($shoppingCart);
  }

  public function getCart() {
    return $this->cartDAO->get();
  }
}