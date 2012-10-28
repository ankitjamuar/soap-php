<?php

use SymfonyWorld\Post;
use SymfonyWorld\Manager;

use SymfonyWorld\Soap\Service;
use SymfonyWorld\Soap\AuthenticationFault;

class ServiceTest extends PHPUnit_Framework_TestCase
{

  public function __construct()
  {
    $manager = new Manager(__DIR_DATA__.'/data.csv');
    $this->service = new Service($manager);
  }

  public function testAuthenticationError()
  {
    $this->setExpectedException('SymfonyWorld\Soap\AuthenticationFault');
    $this->service->getPostCount('wrong', 'credentials');
  }

  public function testOperationTagsCount()
  {
    $tags_count = $this->service->getTagsCount('foo', 'bar');
    $this->assertCount(7, $tags_count);
    $this->assertEquals(1, $tags_count['AJAX']);
    $this->assertEquals(5, $tags_count['symfony1x']);
    $this->assertEquals(1, $tags_count['filter']);
    $this->assertEquals(1, $tags_count['SQL']);
    $this->assertEquals(1, $tags_count['prestashop']);
    $this->assertEquals(1, $tags_count['security']);
    $this->assertEquals(1, $tags_count['swift_mailer']);
  }
}
