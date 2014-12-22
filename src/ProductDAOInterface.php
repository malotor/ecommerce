<?php

namespace malotor\ecommerce;

interface ProductDAOInterface {

  /**
   *
   * @return malotor\ecommerce\Product
   **/
  function get($nid);

  function save($product);

} 