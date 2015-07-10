<?php
namespace Cerad\Component\Test\React;

use Cerad\Component\React\AbstractComponent;

class ContentComponent extends AbstractComponent
{
  public function render()
  {
    return <<<TYPEOTHER
<div id="content>
{$this->escape($this->props['content'])}
</div>
TYPEOTHER;
  }
}