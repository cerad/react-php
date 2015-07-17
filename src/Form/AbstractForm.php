<?php
namespace Cerad\Component\Form;

use Cerad\Component\View\FormView;

class AbstractForm
{
  protected $state;
  protected $action = '';
  protected $method = 'Post';

  protected $submitted = false;
  protected $validated = false;

  protected $buttonClicked = null;

  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setAction($action)
  {
    $this->action = $action;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function isClicked($name)
  {
    return $this->buttonClicked === $name;
  }
  public function submit($post)
  {
    return;
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