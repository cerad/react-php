<?php
namespace Cerad\Component\View;

class TextInputView extends AbstractInputView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_input.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'type','name','value',
      'readonly','required','disabled',
      'maxlength','size',
      'pattern','placeholder',
      'autocomplete','autofocus','form',
    ]);
    $props = array_replace([
      'type'  => 'text',
      'name'  => null,
      'value' => null,
      'label' => null, // Optional, should be possible to specify before or after
    ],$props);

    parent::__construct($props);
  }
}