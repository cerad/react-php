<?php
namespace Cerad\Component\View;

class InputView extends AbstractView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_input.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'type',
      'name',
      'readonly',
      'required', // H5
      'disabled',
      'checked',      // checkbox, radio
      'alt',          // images
      'maxlength',
      'size',
      'src',          // image
      'accept', // file

      // html5
      'autocomplete',
      'autofocus',

      'form',         // lots more form stuff
      'formaction',   // submit, image

      'pattern',
      'placeholder',

      'value',
    ]);
    $props = array_replace([
      'type'  => null,
      'name'  => null,
      'value' => null,
    ],$props);

    parent::__construct($props);

  }
  protected function renderLabel()
  {
    $props = $this->props;

    if (!isset($props['label'])) return null;

    $content = $this->escape($props['label']);
    $for = isset($props['id']) ? $this->escape($props['id']) : null;

    $label = new LabelView([
      'for'     => $for,
      'content' => $content,
    ]);
    return $label->render();
  }
  public function render()
  {
    // Future: If have a label then need an id
    $attrsHtml = $this->renderAttrs($this->attrKeys);

    return <<<TYPEOTHER
{$this->renderLabel()}
<input{$attrsHtml}>
TYPEOTHER;

  }
}