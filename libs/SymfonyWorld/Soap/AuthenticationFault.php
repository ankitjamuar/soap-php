<?php

namespace SymfonyWorld\Soap;

class AuthenticationFault extends \SoapFault
{
  public function __construct($message = 'Incorrect login/password')
  {
    parent::__construct("500", "Authentication failed", null, $message);
  }
}
