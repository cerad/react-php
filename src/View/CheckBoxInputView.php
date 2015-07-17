<?php
namespace Cerad\Component\View;

class CheckBoxInputView extends AbstractInputView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_input.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'type','name','checked','value',
      'readonly','required','disabled',
      //'maxlength','size',
      //'autocomplete','autofocus','form','pattern','placeholder',
    ]);
    $props = array_replace([
      'type'  => 'checkbox',
      'name'  => null,
      'value' => null,
    ],$props);

    parent::__construct($props);
  }
}