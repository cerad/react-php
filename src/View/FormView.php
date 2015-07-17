<?php
namespace Cerad\Component\View;

class FormView extends AbstractView
{
  protected $tag = 'form';

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
    ],$props);
    parent::__construct($props);
  }
  public function renderStart()
  {
    return <<<TYPEOTHER
<form{$this->renderAttrs($this->attrKeys)}>
TYPEOTHER;
  }
  public function render()
  {
    $attrsHtml = $this->renderAttrs($this->attrKeys);

    return <<<TYPEOTHER
<{$this->tag}{$attrsHtml}>
{$this->renderChildren()}
</$this->tag>
TYPEOTHER;

  }
}