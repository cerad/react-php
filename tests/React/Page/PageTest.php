<?php
namespace Cerad\Component\Test\React\Page;

class PageTest extends \PHPUnit_Framework_TestCase
{
  protected function assertEqualsx($str1,$str2)
  {
    $str1 = str_replace(["\r"],'',$str1);
    $str2 = str_replace(["\r"],'',$str2);
    $this->assertEquals($str1,$str2);
  }
  public function testPageBaseComponent()
  {
    $pageBaseComponent = new PageBaseComponent();

    $expect = <<<TYPEOTHER
<html>
<head>
<title>Base</title>

</head>
<body>
<div id="content">

</div>

</body>
</html>
TYPEOTHER;

    $this->assertEqualsx($expect,$pageBaseComponent->render());
  }
  public function testContentComponent()
  {
    $contentComponent = new ContentComponent();

    $expect = <<<TYPEOTHER
<html>
<head>
<title>Content Title</title>

</head>
<body>
<div id="content">
Some Content
</div>

</body>
</html>
TYPEOTHER;

    $this->assertEqualsx($expect,$contentComponent->render());

  }
  public function testContentWithBlocksComponent()
  {
    $contentComponent = new ContentWithBlocksComponent();

    $expect = <<<TYPEOTHER
<html>
<head>
<title>Content Title</title>
<link href="/css/content.css" rel="stylesheet" />
</head>
<body>
<div id="content">
Some Content
</div>
<script src="/js/app.css"></script>script>
<script>var a = 1;</script>
</body>
</html>
TYPEOTHER;

    $this->assertEqualsx($expect,$contentComponent->render());

  }
}