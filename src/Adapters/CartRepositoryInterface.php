<?php

namespace malotor\ecommerce\Adapters;

interface CartRepositoryInterface {

  /**
   * @return malotor\ecommerce\Cart
   **/
  function get();

  function save($cart);

}