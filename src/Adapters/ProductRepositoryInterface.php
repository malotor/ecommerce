<?php

namespace malotor\ecommerce\Adapters;

interface ProductRepositoryInterface {

  /**
   * @return malotor\ecommerce\Product
   **/
  function get($nid);
} 