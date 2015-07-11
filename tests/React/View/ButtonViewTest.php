<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\View\IView;
use Cerad\Component\View\ButtonView;

class ButtonViewTest extends \PHPUnit_Framework_TestCase
{
  protected function assertEqualsEol($str1,$str2)
  {
    $str1 = str_replace(["\r","\n"],'',$str1);
    $str2 = str_replace(["\r","\n"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
  public function testButtonView()
  {
    $buttonView = new ButtonView([
      'type'  => 'submit',
      'class' => 'btn btn-success',
      'children' => [
        'Yes'
      ],
    ]);

    $expect = <<<TYPEOTHER
<button class="btn btn-success" type="submit">Yes</button>
TYPEOTHER;

    $this->assertEqualsEol($expect,$buttonView->render());
  }
  public function testIView()
  {
    $iView = new IView([
      'type'  => 'submit',
      'class' => 'icon-circle-arrow-right icon-large',
    ]);

    $expect = <<<TYPEOTHER
<i class="icon-circle-arrow-right icon-large"></i>
TYPEOTHER;

    $this->assertEqualsEol($expect,$iView->render());
  }
  public function testButtonWithIView()
  {
    $iView = new IView([
      'type'  => 'submit',
      'class' => 'icon-circle-arrow-right icon-large',
    ]);
    $buttonView = new ButtonView([
      'type'  => 'submit',
      'class' => 'btn btn-success',
      'children' => [
        $iView,
        'Yes'
      ],
    ]);
    $expect = <<<TYPEOTHER
<button class="btn btn-success" type="submit">
<i class="icon-circle-arrow-right icon-large"></i>
Yes
</button>
TYPEOTHER;

    $this->assertEqualsEol($expect,$buttonView->render());
  }
}