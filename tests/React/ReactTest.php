<?php
namespace Cerad\Component\Test\React;

class ReactTest extends \PHPUnit_Framework_TestCase
{
  public function testTitleComponent()
  {
    $titleComponent = new TitleComponent(['title' => 'Buffy & Spike']);

    $expects = <<<TYPEOTHER
<title>Buffy &amp; Spike</title>
TYPEOTHER;

    $this->assertEquals($expects,$titleComponent->render());
  }
  public function testPageComponent()
  {
    $pageComponent = new PageComponent([
      'title' => 'Buffy & Spike',
      'content' => 'A Love Story',
    ]);

    $expect = <<<TYPEOTHER
<html>
  <head>
    <title>Buffy &amp; Spike</title>
  </head>
  <body>
    <div id="content>
A Love Story
</div>
  </body>
</html>
TYPEOTHER;

    $this->assertEquals($expect,$pageComponent->render());
  }
  public function testTeamRowComponent()
  {
    $team = [
      'place' => '1st', 'country' => 'USA', 'name' => 'United States',
    ];
    $teamRowComponent = new TeamRowComponent([
      'team' => $team,
    ]);

    $expect = <<<TYPEOTHER
<tr><td>1st</td><td>USA</td><td>United States</td></tr>
TYPEOTHER;

    $this->assertEquals($expect,$teamRowComponent->render());
  }
  public function testTeamTableComponent()
  {
    $teams = [
      ['place' => '1st', 'country' => 'USA', 'name' => 'United States'],
      ['place' => '2nd', 'country' => 'JAP', 'name' => 'Japan'],
      ['place' => '4th', 'country' => 'GER', 'name' => 'Germany'],
      ['place' => '3rd', 'country' => 'END', 'name' => 'England'],
    ];
    $teamTableComponent = new TeamTableComponent([
      'title' => "Women's World Cop 2015",
      'teams' => $teams,
    ]);

    $expect = <<<TYPEOTHER
<table>
  <thead>
    <tr><th colspan="5">Women's World Cop 2015</th></tr>
    <tr><th>Place</th><th>Country</th><th>Name</th></tr>
  </thead>
  <tbody>
<tr><td>1st</td><td>USA</td><td>United States</td></tr>
<tr><td>2nd</td><td>JAP</td><td>Japan</td></tr>
<tr><td>3rd</td><td>END</td><td>England</td></tr>
<tr><td>4th</td><td>GER</td><td>Germany</td></tr>

  </tbody>
</table>
TYPEOTHER;

    // Need to figure out this line ending stuff some day
    $expect = str_replace(["\n"],PHP_EOL,$expect);
    $html   = str_replace(["\n"],PHP_EOL,$teamTableComponent->render());
    $this->assertEquals($expect,$html);
  }
  public function testLoginFormComponent()
  {
    $loginFormComponent = new LoginFormComponent([
      'action'        => '/login',
      'last_username' => 'lloyd',
    ]);

    $expect = <<<TYPEOTHER
<form action="/login" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="_username" value="lloyd" />
  <label for="password">Password:</label>
  <input type="password" id="password" name="_password" />
  <button type="submit">Login</button>
</form>
TYPEOTHER;

    $this->assertEquals($expect,$loginFormComponent->render());
  }
  public function testSubmitButton()
  {

  }
}