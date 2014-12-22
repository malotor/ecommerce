<?php


namespace malotor\ecommerce;

interface CartLineInterface {

  function getProductReference();
  function getQuantity();
  function lineCartAmount();
}