<?php
namespace Cerad\Component\Test\React;

use Cerad\Component\React\AbstractComponent;

class LoginFormComponent extends AbstractComponent
{
  public function render()
  {
    $action = $this->props['action'];
    $last_username =
      isset($this->props['last_username']) ?
        $this->escape($this->props['last_username']) :
        null;

    return <<<TYPEOTHER
<form action="{$action}" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="_username" value="{$last_username}" />
  <label for="password">Password:</label>
  <input type="password" id="password" name="_password" />
  <button type="submit">Login</button>
</form>
TYPEOTHER;
  }
}