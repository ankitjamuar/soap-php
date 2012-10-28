<?php

namespace SymfonyWorld\Soap;

class Logger
{
  static function log($file, $xml_str, $multiline = false)
  {
    if ($multiline)
    {
      $dom = new \DOMDocument('1.0');
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;
      $dom->loadXML($xml_str);
      $xml_str = $dom->saveXML();
    }
    file_put_contents($file, $xml_str, FILE_APPEND);
  }  
}
