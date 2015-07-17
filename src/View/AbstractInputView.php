<?php
namespace Cerad\Component\View;

class AbstractInputView extends AbstractView
{
  protected $tag = 'input';

  protected function renderLabel()
  {
    $props = $this->props;

    if (!isset($props['label'])) return null;

    $for = isset($props['id']) ? $props['id'] : $props['name'];

    $label = new LabelView([
      'for'     => $for,
      'content' => $props['label'],
    ]);
    return $label->render();
  }
  public function render()
  {
    return sprintf("%s<%s%s>\n",$this->renderLabel(),$this->tag,$this->renderAttrs($this->attrKeys));
  }
}