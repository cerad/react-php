<?php
namespace Cerad\Component\Test\React;

use Cerad\Component\React\AbstractComponent;

class PageComponent extends AbstractComponent
{
  public function render()
  {
    $titleComponent   = new   TitleComponent(['title'   => $this->props['title']]);
    $contentComponent = new ContentComponent(['content' => $this->props['content']]);

    return <<<TYPEOTHER
<html>
  <head>
    {$titleComponent->render()}
  </head>
  <body>
    {$contentComponent->render()}
  </body>
</html>
TYPEOTHER;
  }
}