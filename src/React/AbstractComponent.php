<?php
namespace Cerad\Component\React;

abstract class AbstractComponent
{
  protected $props = [];

  public function __construct(array $props = [])
  {
    $this->replaceProps($props);
  }
  public function replaceProps(array $props)
  {
    $this->props = array_replace($this->props,$props);
  }
  protected function escape($string)
  {
    return htmlspecialchars($string, ENT_COMPAT | ENT_HTML5, 'UTF-8');
  }
  abstract public function render();
}