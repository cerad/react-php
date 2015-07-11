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

  protected function renderAttrs(array $keys)
  {
    $props = $this->props;
    $html  = null;
    foreach($keys as $key)
    {
      $value = isset($props[$key]) ? $props[$key] : null;
      if ($value !== null && $value !== false) {
        $html .=
          $value === true ?
            ' ' . $key :
            sprintf(' %s="%s"',$key,$this->escape($value));
      }
    }
    return $html;
  }
  protected function renderChildren()
  {
    if (!isset($this->props['children'])) return null;

    $html = null;

    foreach($this->props['children'] as $child)
    {
      $html .= is_object($child) ?
        $child->render()      . "\n":
        $this->escape($child) . "\n";
    }
    return $html;
  }
}