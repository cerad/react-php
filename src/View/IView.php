<?php
namespace Cerad\Component\View;

class IView extends AbstractView
{
  protected $tag = 'i';

  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_i.asp
    $this->attrKeys = array_merge($this->attrKeys,[
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