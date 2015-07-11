<?php
namespace Cerad\Component\View;

class FormView extends AbstractView
{
  public function __construct($props = [])
  {
    // http://www.w3schools.com/tags/tag_form.asp
    $this->attrKeys = array_merge($this->attrKeys,[
      'accept-charset',
      'action',
      'autocomplete',
      'enctype',
      'method',
      'name',
      'novalidate',
      'target',
    ]);
    $props = array_replace([
      'action'   => null,
      'method'   => 'post',
      'enctype'  => 'application/x-www-form-urlencoded', // multipart/form-data text/plain
      'elements' => [],
    ],$props);
    parent::__construct($props);
  }
  protected function renderElements()
  {
    $html = null;

    foreach($this->props['elements'] as $element)
    {
      $html .= $element->render() . "\n";
    }
    return $html;
  }
  public function render()
  {
    $attrsHtml = $this->renderAttrs($this->attrKeys);

    return <<<TYPEOTHER
<form{$attrsHtml}>{$this->renderElements()}</form>
TYPEOTHER;

  }
}