<?php
namespace Cerad\Component\Test\React\Page;

use Cerad\Component\React\AbstractComponent;

class PageBaseComponent extends AbstractComponent
{
  protected $props = [
    'title'     => 'Base',
    'content'   => null,

     'jsBlock'  => null,
    'cssBlock'  => null,
  ];
  public function setTitle($title)
  {
    $this->props['title'] = $title;
  }
  public function setContent($content)
  {
    $this->props['content'] = $content;
  }
  public function appendToCssBlock($css)
  {
    $css = trim($css);
    if (!$css) return;

    $cssBlock = $this->props['cssBlock'];
    if ($cssBlock) $cssBlock .= "\n";
    if ($css[0] === '<') $cssBlock .= $css;
    else {
      $cssBlock .= sprintf('<link href="%s" rel="stylesheet" />',$this->escape($css));
    }
    $this->props['cssBlock'] = $cssBlock;
  }
  public function appendToJsBlock($js)
  {
    $js = trim($js);
    if (!$js) return;

    $jsBlock = $this->props['jsBlock'];
    if ($jsBlock) $jsBlock .= "\n";
    if ($js[0] === '<') $jsBlock .= $js;
    else {
      $jsBlock .= sprintf('<script src="%s"></script>script>',$this->escape($js));
    }
    $this->props['jsBlock'] = $jsBlock;
  }
  public function render()
  {
    $props = $this->props;

    $title = $this->escape($props['title']);

    // Do not content and blocks
    $jsBlock  = $props['jsBlock'];
    $cssBlock = $props['cssBlock'];
    $content  = $props['content'];

    return <<<TYPEOTHER
<html>
<head>
<title>{$title}</title>
{$cssBlock}
</head>
<body>
<div id="content">
{$content}
</div>
{$jsBlock}
</body>
</html>
TYPEOTHER;
  }
}