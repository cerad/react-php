<?php
namespace Cerad\Component\Test\React\Page;

use Cerad\Component\React\AbstractComponent;

class ContentComponent extends AbstractComponent
{
  public function render()
  {
    $pageBaseComponent = new PageBaseComponent();

    $pageBaseComponent->replaceProps(['title' => 'Content Title']);

    $html = <<<TYPEOTHER
Some Content
TYPEOTHER;

    $pageBaseComponent->replaceProps(['content' => $html]);

    return $pageBaseComponent->render();
  }
}