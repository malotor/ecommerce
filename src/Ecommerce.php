<?php

namespace malotor\ecommerce;

class Ecommerce {

  protected $productDAO;
  protected $cartDAO;

  public function __construct(Adapters\ProductRepositoryInterface $productRepository, Adapters\CartRepositoryInterface $cartRepository) {
    $this->productRepository = $productRepository;
    $this->cartRepository = $cartRepository;
  }

  public function addProductToCart($productId, $quantity) {
    $product = $this->productRepository->get($productId);
    $shoppingCart = $this->cartRepository->get();
    $shoppingCart->addCartLine(CartLine::create($product, $quantity));
    $this->cartRepository->save($shoppingCart);
  }

  public function removeProductFromCart($productId) {
    $product = $this->productRepository->get($productId);
    $shoppingCart = $this->cartRepository->get();
    $shoppingCart->removeCartLine($product->getReference());
    $this->cartRepository->save($shoppingCart);
  }

  public function getCart() {
    return $this->cartRepository->get();
  }
}