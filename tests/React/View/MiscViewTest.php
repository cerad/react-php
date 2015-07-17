<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\View\LabelView;

use Cerad\Component\Test\React\AbstractTst;

class MiscViewTest extends AbstractTst
{
  public function testLabelView()
  {
    $view = new LabelView([
      'for'     => 'element-id',
      'content' => 'The Label',
    ]);

    $expect = <<<TYPEOTHER
<label for="element-id">The Label</label>
TYPEOTHER;

    $this->assertEqualsEol($expect, $view->render());
  }
}
