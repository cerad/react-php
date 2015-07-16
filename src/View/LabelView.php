<?php
namespace Cerad\Component\View;

class LabelView extends AbstractView
{
  protected $tag = 'label';

  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_label.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'for', 'form',
    ]);
    $props = array_replace([
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