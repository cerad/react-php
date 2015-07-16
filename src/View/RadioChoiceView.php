<?php
namespace Cerad\Component\View;

class RadioChoiceView extends AbstractView
{
  public function __construct($props = [])
  {
    $this->attrKeys = array_merge($this->attrKeys,[
      'name','multiple','disabled','size',
      // html5
      'autofocus','required','form'
    ]);
    $props = array_replace([
      'value'   => null,
      'choices' => [],
    ],$props);
    parent::__construct($props);
  }
  protected function renderLabel() // keep for now
  {
    $props = $this->props;

    if (!isset($props['label'])) return null;

    $label = $this->escape($props['label']);
    $id = isset($props['id']) ? $this->escape($props['id']) : null;

    return <<<TYPEOTHER
<label for="{$id}">{$label}</label>
TYPEOTHER;
  }
  protected function renderChoices()
  {
    $props = $this->props;

    $values = is_array($props['value']) ? $props['value'] : [$props['value']];

    $html = null;
    $optionView = new OptionView();
    foreach($props['choices'] as $key => $value) {
      $selected = false;
      foreach($values as $valueKey) {
        if ($key == $valueKey) {
          $selected = true;
        }
      }
      $optionView->replaceProps([
        'value'    => $key,
        'content'  => $value,
        'selected' => $selected,
      ]);
      $html .= $optionView->render() . "\n";
    }
    return $html;
  }
  public function render()
  {
    return <<<TYPEOTHER
{$this->renderLabel()}
<$this->tag{$this->renderAttrs()}>
{$this->renderChoices()}
</$this->tag>
TYPEOTHER;

  }
}