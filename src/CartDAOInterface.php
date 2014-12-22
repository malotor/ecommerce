<?php
/**
 * Created by PhpStorm.
 * User: manel
 * Date: 21/12/14
 * Time: 21:28
 */

namespace malotor\ecommerce;

interface CartDAOInterface {
  function get();
  function save($cart);
} 