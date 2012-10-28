<?php

namespace SymfonyWorld\Soap;

use SymfonyWorld\Post;
use SymfonyWorld\Manager;

class Service
{
  private $manager;

  public function __construct(\SymfonyWorld\Manager $manager)
  {
    $this->manager = $manager;
  }

  /**
   * Returns true if authentication parameters are correct, false otherwise.
   *
   * @param String $login
   * @param String $password
   * @return Boolean 
   */
  private function authenticate($login, $password)
  {
    return ($login == 'foo' && $password == 'bar');
  }

  /**
   * Get counts for all tags (number of occurence).
   *
   * @param String $login
   * @param String $password
   * @return Array
   * @throws \SymfonyWorld\Soap\AuthenticationFault
   */
  public function getTagsCount($login, $password)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    return $this->manager->getTagsCount();
  }

  /**
   * Get all Tags (search all Post objects).
   *
   * @param String $login
   * @param String $password
   * @return Array
   * @throws \SymfonyWorld\Soap\AuthenticationFault
   */
  public function getAllTags($login, $password)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    return $this->manager->getUniqueTags();
  }

  /**
   * Get number of all posts available through the service.
   *
   * @param String $login
   * @param String $password
   * @return Integer
   * @throws \SymfonyWorld\Soap\AuthenticationFault
   */
  public function getPostCount($login, $password)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    return $this->manager->getPostCount();
  }

  /**
   * Get Post object given by ID.
   *
   * @param String $login
   * @param String $password
   * @param Integer $id
   * @return \SymfonyWorld\Post
   * @throws \SymfonyWorld\Soap\AuthenticationFault
   */
  public function getPostById($login, $password, $id)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    return $this->manager->getPostById($id);
  }

  /**
   * Get Post objects that have a given tag.
   *
   * @param String $login
   * @param String $password
   * @param String $tag
   * @return Array
   * @throws \SymfonyWorld\Soap\AuthenticationFault 
   */
  public function getPostsByTag($login, $password, $tag)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    return $this->manager->getPostsByTag($tag);
  }

  /**
   * Add new Post object.
   *
   * @param String $login
   * @param String $password
   * @param Array $pst_parameters
   * @return Boolean
   * @throws \SymfonyWorld\Soap\AuthenticationFault 
   * @throws \SoapFault 
   */
  public function addPost($login, $password, array $post_parameters)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    if (!isset($post_parameters['id'])
      && isset($post_parameters['title'])
      && isset($post_parameters['link'])
      && is_array($post_parameters['tags'])
    ) {
      $post = new Post(null, $post_parameters['title'], $post_parameters['link'], $post_parameters['tags']);
      $this->manager->createPost($post);
      return true;
    }
    else
      throw new \SoapFault("501", "Wrong Parameters");
  }
 
  /**
   * Delete existing Post object.
   * 
   * @param String $login
   * @param String $password
   * @param String $password
   * @return Boolean
   * @throws \SymfonyWorld\Soap\AuthenticationFault 
   */
  public function deletePost($login, $password, $id)
  {
    if (!$this->authenticate($login, $password))
      throw new AuthenticationFault();
    $this->manager->deletePostById($id);
    return true;
  }
}
