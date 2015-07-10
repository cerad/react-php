<?php
namespace Cerad\Component\Test\React\Page;

use Cerad\Component\React\AbstractComponent;

class PageLayoutComponent extends AbstractComponent
{
  protected $pageBaseComponent;

  public function __construct()
  {
    $this->pageBaseComponent = new PageBaseComponent();
  }
  public function setTitle($title)
  {
    $this->pageBaseComponent->setTitle($title);
  }
  public function setContent($content)
  {
    $this->pageBaseComponent->setContent($content);
  }
  public function appendToCssBlock($css)
  {
    $this->pageBaseComponent->appendToCssBlock($css);
  }
  public function appendToJsBlock($js)
  {
    $this->pageBaseComponent->appendToJsBlock($js);
  }
  public function render()
  {
    return $this->pageBaseComponent->render();
  }
}