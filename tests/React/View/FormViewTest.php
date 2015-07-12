<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\View\FormView;
use Cerad\Component\View\InputView;
use Cerad\Component\View\ButtonView;

use Cerad\Component\Test\React\AbstractTst;

class FormViewTest extends AbstractTst
{
  public function testFormView()
  {
    $userInputView = new InputView([
      'type'  => 'text',
      'name'  => 'username',
      'value' => '',
    ]);
    $passInputView = new InputView([
      'type' => 'password',
      'name' => 'userpass'
    ]);
    $buttonView = new ButtonView([
      'type'  => 'submit',
      'class' => 'btn btn-success',
      'children' => [
        'Sign On'
      ],
    ]);
    $formView = new FormView([
      'action'   => '/form',
      'children' => [
        'username' => $userInputView,
        'userpass' => $passInputView,
        'login'    => $buttonView,
      ],
    ]);

    $expect = <<<TYPEOTHER
<form action="/form" enctype="application/x-www-form-urlencoded" method="post">
<input type="text" name="username" value="">
<input type="password" name="userpass">
<button class="btn btn-success" type="submit">Sign On</button>
</form>
TYPEOTHER;

    $this->assertEqualsEol($expect,$formView->render());
  }
}