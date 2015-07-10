<?php
namespace Cerad\Component\Test\React;

use Cerad\Component\React\AbstractComponent;

class TeamRowComponent extends AbstractComponent
{
  public function render()
  {
    $team = $this->props['team'];

    return <<<TYPEOTHER
<tr><td>{$this->escape($team['place'])}</td><td>{$this->escape($team['country'])}</td><td>{$this->escape($team['name'])}</td></tr>
TYPEOTHER;
  }
}