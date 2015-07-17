<?php
namespace Cerad\Component\View;

abstract class AbstractView
{
  protected $props = [];

  // http://www.w3schools.com/tags/ref_standardattributes.asp
  protected $attrKeys = [
    'id',
    'class',
    'lang',
    'style',
    'tabindex',
    'title',

    'data-*', // H5
  ];

  public function __construct(array $props = [])
  {
    $this->props = array_replace($this->props,$props);
  }
  public function replaceProps(array $props)
  {
    $this->props = array_replace($this->props,$props);
  }
  protected function escape($string)
  {
    return htmlspecialchars($string, ENT_COMPAT | ENT_HTML5, 'UTF-8');
  }
  abstract public function render();

  public function renderAttrs(array $attrKeys = null)
  {
    $attrKeys = $attrKeys ? $attrKeys : $this->attrKeys;

    $props = $this->props;
    $html  = null;
    foreach($attrKeys as $attrKey)
    {
      $value = isset($props[$attrKey]) ? $props[$attrKey] : null;
      if ($value !== null && $value !== false) {
        $html .=
          $value === true ?
            ' ' . $attrKey :
            sprintf(' %s="%s"',$attrKey,$this->escape($value));
      }
    }
    return $html;
  }
  protected function renderChildren()
  {
    if (!isset($this->props['children'])) return null;

    $html = null;
    $children = $this->props['children'];
    $children = is_array($children) ? $children : [$children];
    foreach($children as $child)
    {
      if (is_array($child)) {
        $html .= $this->renderChildren($child);
      }
      if (is_object($child)) {
        $html .= $child->render();
      }
      if (is_string($child)) {
        $html .= $this->escape($child);
      }
      $html .= "\n";
    }
    return $html;
  }
}