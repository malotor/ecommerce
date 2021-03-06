<?php

namespace malotor\ecommerce;

class Order {

  protected $items;
  protected $creationDate;

  public function __construct() {
    $this->items = [];
    $this->creationDate = time();
  }

  public function countItems() {
    return count($this->items);
  }


  public function addCartLine($newItem) {
    $this->items[] = $newItem;
  }

  public function totalAmount() {
    $result = 0;
    foreach ($this->items as $item) {
      $result += $item->lineCartAmount();
    }

    return $result;
  }

  public function getCreationDate() {
    return $this->creationDate;
  }
}