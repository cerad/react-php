<?php
namespace Cerad\Component\Test\React;

class AbstractTst extends \PHPUnit_Framework_TestCase
{
  protected function assertEqualsEol($str1,$str2)
  {
    $str1 = str_replace(["\r","\n"],'',$str1);
    $str2 = str_replace(["\r","\n"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
  protected function assertEqualsIgnoreEols($str1,$str2)
  {
    $str1 = str_replace(["\r","\n"],'',$str1);
    $str2 = str_replace(["\r","\n"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
}