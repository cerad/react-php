<?php
namespace Cerad\Component\View;

class CheckBoxChoiceView extends AbstractInputView
{
  protected $tag = 'div';

  public function __construct($props = [])
  {
    $this->attrKeys = array_merge($this->attrKeys,[
      'name','required','disabled',
    ]);
    $props = array_replace([
      'value'   => null,
      'choices' => [],
    ],$props);
    parent::__construct($props);
  }
  protected function renderChoices()
  {
    $props = $this->props;

    $values = is_array($props['value']) ? $props['value'] : [$props['value']];

    $html = null;
    $labelView = new LabelView();
    $inputView = new CheckBoxInputView();
    foreach($props['choices'] as $key => $value) {
      $checked = false;
      foreach($values as $valueKey) {
        if ($key == $valueKey) {
          $checked = true;
        }
      }
      $inputView->replaceProps([
        'id'       => $props['name'] . '-' . $key,
        'name'     => $props['name'],
        'value'    => $key,
        'checked'  => $checked,
      ]);
      $labelView->replaceProps([
        'for'     => $props['name'] . '-' . $key,
        'content' => $value,
      ]);
      $html .= sprintf("%s%s\n",$inputView->render(),$labelView->render());
    }
    return $html;
  }
  public function render()
  {
    return <<<TYPEOTHER
{$this->renderLabel()}
<div style="display: inline;"{$this->renderAttrs()}>
{$this->renderChoices()}
</div>
TYPEOTHER;

  }
}