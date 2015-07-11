<?php
namespace Cerad\Component\View;

class OptionView extends AbstractView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_option.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'disabled',
      'label',
      'selected',
      'value',
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
<option{$attrsHtml}>{$content}</option>
TYPEOTHER;

  }
}