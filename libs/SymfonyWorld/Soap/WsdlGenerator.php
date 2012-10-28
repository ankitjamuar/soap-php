<?php

namespace SymfonyWorld\Soap;

use Zend\Soap\AutoDiscover;
use Zend\Soap\Server;

class WsdlGenerator
{
  private $uri;
  private $service_name;

  public function __construct($uri, $service_name)
  {
    $this->uri = $uri;
    $this->service_name = $service_name;
  }

  private function generate()
  {
    $autodiscover = new \Zend\Soap\AutoDiscover();
    $autodiscover->setClass('\SymfonyWorld\Soap\Service')
      ->setUri($this->uri)
      ->setServiceName($this->service_name);
    return $autodiscover->generate();
  }

  public function dump($filename)
  {
    $wsdl = $this->generate();
    $wsdl->dump($filename);
  }

  public function __toString()
  {
    $wsdl = $this->generate();
    header("Content-type: text/xml");
    return $wsdl->toXml();
  }
}
