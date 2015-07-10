<?php
namespace Cerad\Component\Test\React\Page;

use Cerad\Component\React\AbstractComponent;

class ContentWithBlocksComponent extends AbstractComponent
{
  protected function renderAppScript()
  {
    return <<<TYPEOTHER
<script>var a = 1;</script>
TYPEOTHER;
  }
  public function render()
  {
    $pageLayoutComponent = new PageLayoutComponent();

    $pageLayoutComponent->setTitle('Content Title');

    $pageLayoutComponent->appendToCssBlock('/css/content.css');

    $pageLayoutComponent->appendToJsBlock('/js/app.css');
    $pageLayoutComponent->appendToJsBlock($this->renderAppScript());

    $html = <<<TYPEOTHER
Some Content
TYPEOTHER;

    $pageLayoutComponent->setContent($html);

    return $pageLayoutComponent->render();
  }
}