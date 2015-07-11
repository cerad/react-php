<?php
namespace Cerad\Component\View;

class SelectView extends AbstractView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_select.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'name','multiple','disabled','size',
      // html5
      'autofocus','required','form'
    ]);
    $props = array_replace([
      'value'   => null,
      'options' => [],
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
  protected function renderOptions()
  {
    $props = $this->props;

    $values = is_array($props['value']) ? $props['value'] : [$props['value']];

    $html = null;
    $optionView = new OptionView();
    foreach($props['options'] as $key => $value) {
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
    $attrsHtml = $this->renderAttrs($this->attrKeys);

    $labelHtml = $this->renderLabel();
    if ($labelHtml) $labelHtml .= "\n";

    return <<<TYPEOTHER
{$labelHtml}<select{$attrsHtml}>
{$this->renderOptions()}
</select>
TYPEOTHER;

  }
}