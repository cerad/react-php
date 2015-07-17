<?php
namespace Cerad\Component\View;

class InputView extends AbstractInputView
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
      'label' => null, // Optional, should be possible to specify before or after
    ],$props);

    parent::__construct($props);
  }


}