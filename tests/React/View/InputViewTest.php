<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\View\InputView;
use Cerad\Component\View\SelectView;

use Cerad\Component\View\RadioInputView;
use Cerad\Component\View\RadioChoiceView;
use Cerad\Component\View\CheckBoxChoiceView;

use Cerad\Component\Test\React\AbstractTst;

class InputViewTest extends AbstractTst
{
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
    $view = new RadioInputView([
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
      'choices' => [
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
  public function testRadioChoiceView()
  {
    $view = new RadioChoiceView([
      'id'    => 'request_assessment',
      'name'  => 'request_assessment',
      'label' => 'Assessment Request',
      'class' => 'radio-medium',
      'value' => 'none',
      'choices' => [
        'none'     => 'None',
        'informal' => 'Informal',
        'formal'   => 'Formal',
      ],
    ]);

    $expect = <<<TYPEOTHER
<label for="request_assessment">Assessment Request</label>
<div style="display: inline;" id="request_assessment" class="radio-medium" name="request_assessment">
<input id="request_assessment-none" type="radio" name="request_assessment" checked value="none">
<label for="request_assessment-none">None</label>
<input id="request_assessment-informal" type="radio" name="request_assessment" value="informal">
<label for="request_assessment-informal">Informal</label>
<input id="request_assessment-formal" type="radio" name="request_assessment" value="formal">
<label for="request_assessment-formal">Formal</label>
</div>
TYPEOTHER;

    $this->assertEqualsEol($expect,$view->render());
  }
  public function testCheckBoxChoiceView()
  {
    $view = new CheckBoxChoiceView([
      'id'     => 'lodging_nights',
      'name'   => 'lodging_nights',
      'label'  => 'Lodging Nights',
      'class'  => 'radio-medium',
      'value'  => [ '20150411', ],
      'choices' => [
        '20150410' => 'Fri',
        '20150411' => 'Sat',
        '20150412' => 'Sun',
      ],
    ]);

    $expect = <<<TYPEOTHER
<label for="lodging_nights">Lodging Nights</label>
<div style="display: inline;" id="lodging_nights" class="radio-medium" name="lodging_nights">
<input id="lodging_nights-20150410" type="checkbox" name="lodging_nights" value="20150410">
<label for="lodging_nights-20150410">Fri</label>
<input id="lodging_nights-20150411" type="checkbox" name="lodging_nights" checked value="20150411">
<label for="lodging_nights-20150411">Sat</label>
<input id="lodging_nights-20150412" type="checkbox" name="lodging_nights" value="20150412">
<label for="lodging_nights-20150412">Sun</label>
</div>
TYPEOTHER;

    $this->assertEqualsIgnoreEols($expect,$view->render());
  }
}