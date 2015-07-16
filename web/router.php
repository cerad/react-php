<?php
include '../vendor/autoload.php';

use Cerad\Component\Form\LoginForm;
use Cerad\Component\Form\ProjectPersonForm;

$uri    = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];

if ($uri === '/plan') {
  $form = new ProjectPersonForm();

  if ($method == 'POST') {
    $form->submit($_POST);
  }
  echo $form->render();
  return;
}

if ($uri === '/login') {
  $data = [
    'username' => 'solo',
    'userpass' => null,
  ];
  $loginForm = new LoginForm();
  $loginForm->setData($data);
  $loginForm->setAction('/login');

  if ($method == 'POST') {
    $loginForm->submit($_POST);
  }
  echo $loginForm->render();
  return;
}
echo "<h2>Index $uri</h2>";
