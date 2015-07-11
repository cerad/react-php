<?php
namespace Cerad\Component\Test\React\Form;

class FormTest extends \PHPUnit_Framework_TestCase
{
  protected function assertEqualsEol($str1,$str2)
  {
    $str1 = str_replace(["\r"],'',$str1);
    $str2 = str_replace(["\r"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
  public function testInputFormComponent()
  {
    $component = new InputFormComponent();
    $component->replaceProps([
      'attrs' => [
        'type'  => 'text',
        'name'  => 'name_last',
        'id'    => 'id1',
      ],
      'value' => 'Solo',
    ]);

    $expect = <<<TYPEOTHER
<input type="text" name="name_last" id="id1" value="Solo">
TYPEOTHER;

    $this->assertEqualsEol($expect,$component->render());
  }
  public function testInputLabelFormComponent()
  {
    $component = new InputFormComponent();
    $component->replaceProps([
      'attrs' => [
        'type'  => 'text',
        'name'  => 'name_last',
        'id'    => 'id1',
      ],
      'value' => 'Solo',
      'label' => 'Last Name',
    ]);

    $expect = <<<TYPEOTHER
<label for="id1">Last Name</label>
<input type="text" name="name_last" id="id1" value="Solo">
TYPEOTHER;

    $this->assertEqualsEol($expect,$component->render());
  }
  public function testGenderFormType()
  {
    $formType = new GenderFormType();
    $formType->setData('male');

    $expect = <<<TYPEOTHER
<label for="male">Male</label>
<input type="radio" name="sex" id="male" value="male" checked="1">
<label for="female">Female</label>
<input type="radio" name="sex" id="female" value="female" checked="">
TYPEOTHER;

    $this->assertEqualsEol($expect,$formType->render());
  }
}