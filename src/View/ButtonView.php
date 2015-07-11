<?php
namespace Cerad\Component\View;

class ButtonView extends AbstractView
{
  protected $tag = 'button';

  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_button.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'autofocus',
      'disabled',
      'form','formaction','formenctype','formmethod','formnovalidate','formtarget',
      'name',
      'type', // button, submit, reset
      'value',
    ]);
    $props = array_replace([
      'type' => 'submit',
    ],$props);
    parent::__construct($props);
  }
  public function render()
  {
    return <<<TYPEOTHER
<{$this->tag}{$this->renderAttrs($this->attrKeys)}>
{$this->renderChildren()}
</{$this->tag}>
TYPEOTHER;
  }
}