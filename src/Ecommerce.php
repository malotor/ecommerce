<?php

namespace malotor\ecommerce;

class Ecommerce {

  protected $productDAO;
  protected $cartDAO;

  public function __construct(Adapters\ProductRepositoryInterface $productRepository, Adapters\CartRepositoryInterface $cartDAO) {
    $this->productRepository = $productRepository;
    $this->cartDAO = $cartDAO;
  }

  public function addProductToCart($productId, $quantity) {
    $product = $this->productRepository->get($productId);
    $shoppingCart = $this->cartDAO->get();
    $shoppingCart->addCartLine(CartLine::create($product, $quantity));
    $this->cartDAO->save($shoppingCart);
  }

  public function getCart() {
    return $this->cartDAO->get();
  }
}