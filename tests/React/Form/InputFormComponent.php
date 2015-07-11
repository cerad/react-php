<?php
namespace Cerad\Component\Test\React\Form;

use Cerad\Component\React\AbstractComponent;

class InputFormComponent extends AbstractComponent
{
  protected $props = [
    'attrs' => [
      'type'  => null,
      'name'  => null,
      'id'    => null,
      'class' => null,
    ],
    'label' => null,
    'value' => null, // Somewhat special
  ];
  public function replaceProps($props)
  {
    // Basically a nested merge
    $props['attrs'] = isset($props['attrs']) ?
        array_replace($this->props['attrs'],$props['attrs']) :
        $this->props['attrs'];

    $this->props = array_replace($this->props,$props);
  }
  public function render()
  {
    $props = $this->props; // print_r($this->props);
    $attrs = null;
    foreach ($props['attrs'] as $key => $value) {
      if ($value !== null) {
        $attrs .= sprintf(' %s="%s"', $key, $this->escape($value));
      }
    }
    if ($props['value'] !== null) {
      $attrs .= sprintf(' value="%s"', $this->escape($props['value']));
    }
    $label = null;
    if ($props['label'] !== null) {
      $label = sprintf('<label for="%s">%s</label>',
        $this->escape($props['attrs']['id']),
        $this->escape($props['label'])
      ) . "\n";
    }

    return <<<TYPEOTHER
{$label}<input{$attrs}>
TYPEOTHER;

  }
}