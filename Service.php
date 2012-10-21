<?php

/**
 * Web service methods
 */
class Service {

  /**
   * Get the hello message
   *
   * @param   string  $name
   * @return  string
   */
  public function hello($name) {
    return "hello $name\n";
  }

  /**
   * Get a nicely formatted string of a person's age
   *
   * @param   string  $name   The name of a person
   * @param   int     $age    The age of a person
   * @return  string
   */
  public function getAgeString($name, $age) {
    return sprintf("%s is %d years old\n", $name, $age);
  }
}