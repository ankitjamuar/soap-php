<?php

require_once __DIR__.'/../autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', '1');

use \SymfonyWorld\Post;
use \SymfonyWorld\Manager;
use \SymfonyWorld\Soap\Service;

$manager = new Manager(__DIR_DATA__.'/data.csv');

$manager->createPost(new Post(null, 'Tytuł', 'Link', array('tag1', 'tag2')), true);

for ($id = 10; $id < 25; $id++)
  $manager->deletePostById($id, true);

//$manager->clearData();

//var_dump($manager);
//var_dump($manager->getPostById(2));
//var_dump($manager->getPostsByTag('symfony1x'));
//var_dump($manager->findPostsByTitle('example'));

$service = new Service($manager);

var_dump($service->getAllTags('foo', 'bar'));

$service->addPost('foo', 'bar', array(
  'title' => 'title',
  'link' => 'link',
  'tags' => array('marilyn', 'manson')
));
