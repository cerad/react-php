<?php
namespace Cerad\Component\Form;

use Cerad\Component\View\FormView;
use Cerad\Component\View\InputView;
use Cerad\Component\View\ButtonView;

class LoginForm
{
  protected $data;
  protected $action = '';
  protected $method = 'Post';

  protected $submitted = false;
  protected $validated = false;

  protected $buttonClicked;

  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setAction($action)
  {
    $this->action = $action;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function isClicked($name) {
    return $this->buttonClicked === $name;
  }
  public function submit($post)
  {
    $this->data['username'] = $post['username'];
    $this->data['userpass'] = $post['userpass'];

    if (isset($post['login'])) {
      $this->buttonClicked = 'login';
    }
  }
  public function render()
  {
    $data = $this->data;

    $userInputView = new InputView([
      'type'  => 'text',
      'name'  => 'username',
      'value' => $data['username'],
    ]);
    $passInputView = new InputView([
      'type'  => 'password',
      'name'  => 'userpass',
      'value' => $data['userpass'],
    ]);
    $buttonView = new ButtonView([
      'type'  => 'submit',
      'name'  => 'login',
      'class' => 'btn btn-success',
      'children' => [
        'Sign On'
      ],
    ]);
    $formView = new FormView([
      'action'   => $this->action,
      'method'   => $this->method,
      'children' => [
        'username' => $userInputView,
        'userpass' => $passInputView,
        'login'    => $buttonView,
      ],
    ]);
    return $formView->render();
  }
}