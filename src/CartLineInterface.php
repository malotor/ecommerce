<?php


namespace malotor\ecommerce;

interface CartLineInterface {

  function getItemReference();
  function getQuantity();
  function lineCartAmount();
}