<?php
/*

class EcommerceBaseTest extends PHPUnit_Framework_TestCase {

  public function setUpServiceContainerMockUp() {
    $this->container = $this->getMockBuilder('Symfony\Component\DependencyInjection\ContainerBuilder')
      ->setMethods(array('get'))
      ->getMock();

  }

  protected function setMockContainerService($service_name, $return = NULL) {
    $expects = $this->container->expects($this->once())
      ->method('get')
      ->with($service_name);

    if (isset($return)) {
      $expects->will($this->returnValue($return));
    }
    else {
      $expects->will($this->returnValue(TRUE));
    }
  }

  protected function initContainer() {
    $this->setUpServiceContainerMockUp();
  }
  protected function setContainer() {

    \Drupal::setContainer($this->container);
  }

}
*/