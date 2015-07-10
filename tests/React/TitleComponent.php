<?php
namespace Cerad\Component\Test\React;

use Cerad\Component\React\AbstractComponent;

class TitleComponent extends AbstractComponent
{
  public function render()
  {
    return <<<TYPEOTHER
<title>{$this->escape($this->props['title'])}</title>
TYPEOTHER;
  }
}