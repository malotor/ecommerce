<?php

namespace malotor\ecommerce;

interface ProductDAOInterface {
  function get($nid);
  function save($product);
} 