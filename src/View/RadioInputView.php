<?php
namespace Cerad\Component\View;

class RadioInputView extends AbstractView
{
  protected $tag = 'input';

  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_input.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'type','name','checked','value',
      'readonly','required','disabled',
      'maxlength','size',
      'autocomplete','autofocus','form','pattern','placeholder',
    ]);
    $props = array_replace([
      'type'  => 'radio',
      'name'  => null,
      'value' => null,
    ],$props);

    parent::__construct($props);

  }
  public function render()
  {
    return <<<TYPEOTHER
<{$this->tag}{$this->renderAttrs($this->attrKeys)}>
TYPEOTHER;

  }
}