<?php
namespace Cerad\Component\Test\React\Form;

class GenderFormType
{
  protected $gender = null;

  public function setData($data)
  {
    $this->gender = $data;
  }
  public function getData()
  {
    return $this->gender;
  }
  public function render()
  {
    $maleRadio = new InputFormComponent();

    $maleRadio->replaceProps([
      'label' => 'Male',
      'attrs' => [
        'type'  => 'radio',
        'name'  => 'sex',
        'id'    => 'male',
        'value' => 'male',
        'checked' => $this->gender === 'male',
      ],
    ]);
    $femaleRadio = new InputFormComponent();

    $femaleRadio->replaceProps([
      'label' => 'Female',
      'attrs' => [
        'type'  => 'radio',
        'name'  => 'sex',
        'id'    => 'female',
        'value' => 'female',
        'checked' => $this->gender === 'female',
      ],
    ]);

    return <<<TYPEOTHER
{$maleRadio->render()}
{$femaleRadio->render()}
TYPEOTHER;

  }
}