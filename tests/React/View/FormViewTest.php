<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\View\FormView;
use Cerad\Component\View\InputView;

class FormViewTest extends \PHPUnit_Framework_TestCase
{
  protected function assertEqualsEol($str1,$str2)
  {
    $str1 = str_replace(["\r","\n"],'',$str1);
    $str2 = str_replace(["\r","\n"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
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
    $formView = new FormView([
      'action'   => '/form',
      'elements' => [
        $userInputView,
        $passInputView,
      ],
    ]);

    $expect = <<<TYPEOTHER
<form action="/form" enctype="application/x-www-form-urlencoded" method="post">
<input type="text" name="username" value="">
<input type="password" name="userpass">
</form>
TYPEOTHER;

    $this->assertEqualsEol($expect,$formView->render());
  }
}