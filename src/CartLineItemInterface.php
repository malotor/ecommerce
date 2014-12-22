<?php


namespace malotor\ecommerce;

interface CartLineItemInterface {

  function getReference();
  function getPrice();
}