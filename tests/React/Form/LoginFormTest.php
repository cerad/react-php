<?php
namespace Cerad\Component\Test\React\View;

use Cerad\Component\Form\LoginForm;

use Cerad\Component\Test\React\AbstractTst;

class LoginFormTest extends AbstractTst
{
  public function testLoginForm()
  {
    $data = [
      'username' => 'solo',
      'userpass' => null,
    ];
    $loginForm = new LoginForm();
    $loginForm->setData($data);
    $loginForm->setAction('/login');

    $expect = <<<TYPEOTHER
<form action="/login" enctype="application/x-www-form-urlencoded" method="Post">
<input type="text" name="username" value="solo">
<input type="password" name="userpass">
<button class="btn btn-success" name="login" type="submit">Sign On</button>
</form>
TYPEOTHER;

    $this->assertEqualsEol($expect, $loginForm->render());
  }

  public function testLoginFormPosted()
  {
    $data = [
      'username' => 'solo',
      'userpass' => null,
    ];
    $loginForm = new LoginForm();
    $loginForm->setData($data);
    $loginForm->setAction('/login');

    $post = [
      'username' => 'solo',
      'userpass' => 'hans',
      'login' => '',
    ];
    $loginForm->submit($post);
    $data = $loginForm->getData();

    $this->assertEquals($post['userpass'],$data['userpass']);
    $this->assertTrue($loginForm->isClicked('login'));
  }
}