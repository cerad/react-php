<?php
namespace Cerad\Component\View;

class LabelView extends AbstractView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_label.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'for',
      'form',
    ]);
    $props = array_replace([
      'content' => null,
    ],$props);
    parent::__construct($props);
  }
  public function render()
  {
    $attrsHtml = $this->renderAttrs($this->attrKeys);

    $content = $this->escape($this->props['content']);

    return <<<TYPEOTHER
<label{$attrsHtml}>{$content}</label>
TYPEOTHER;

  }
}