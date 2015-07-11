<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\View\InputView;
use Cerad\Component\View\SelectView;

class InputViewTest extends \PHPUnit_Framework_TestCase
{
  protected function assertEqualsEol($str1,$str2)
  {
    $str1 = str_replace(["\r","\n"],'',$str1);
    $str2 = str_replace(["\r","\n"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
  public function testTextInputView()
  {
    $view = new InputView([
      'type' => 'text'
    ]);

    $expect = <<<TYPEOTHER
<input type="text">
TYPEOTHER;

    $this->assertEqualsEol($expect,$view->render());
  }
  public function testRadioInputView()
  {
    $view = new InputView([
      'type'    => 'radio',
      'name'    => 'gender',
      'id'      => 'gender-male',
      'value'   => 'male',
      'checked' => true,
    ]);

    $expect = <<<TYPEOTHER
<input id="gender-male" type="radio" name="gender" checked value="male">
TYPEOTHER;

    $this->assertEqualsEol($expect,$view->render());
  }
  public function testRadioInputWithLabelView()
  {
    $view = new InputView([
      'type'    => 'radio',
      'name'    => 'gender',
      'id'      => 'gender-female',
      'value'   => 'female',
      'label'   => 'Female'
    ]);

    $expect = <<<TYPEOTHER
<label for="gender-female">Female</label>
<input id="gender-female" type="radio" name="gender" value="female">
TYPEOTHER;

    $this->assertEqualsEol($expect,$view->render());
  }
  public function testSelectView()
  {
    $view = new SelectView([
      'value' => 42,
      'options' => [
        22 => 'Question',
        42 => 'Answer',
        99 => 'Whatever',
      ],
    ]);

    $expect = <<<TYPEOTHER
<select>
<option value="22">Question</option>
<option selected value="42">Answer</option>
<option value="99">Whatever</option>
</select>
TYPEOTHER;

    $this->assertEqualsEol($expect,$view->render());
  }
}