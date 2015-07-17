<?php
namespace Cerad\Component\Form;

use Cerad\Component\View\FormView;
use Cerad\Component\View\TextInputView;
use Cerad\Component\View\SelectView;
use Cerad\Component\View\RadioChoiceView;
use Cerad\Component\View\CheckBoxChoiceView;

class ProjectPersonForm extends AbstractForm
{
  protected $projectPerson;

  public function setData($projectPerson)
  {
    $this->projectPerson = $projectPerson;
  }
  public function render()
  {
    $projectPerson = $this->projectPerson;

    $refereeLevel = new SelectView([
      'id'    => 'referee_level',
      'name'  => 'referee_level',
      'label' => 'Level to Referee At: ',
      'value' => 'elite',
      'choices' => [
        'competitive'  => 'Competitive',
        'elite'        => 'Elite',
        'recreational' => 'Recreational',
      ],
    ]);
    $refereeLevelCenter = new SelectView([
      'id'    => 'referee_level_center',
      'name'  => 'referee_level_center',
      'label' => 'Comfort Level to Center: ',
      'value' => 'U10',
      'choices' => [
        'U10'=>'U10','U12'=>'U12','U14'=>'U14','U16'=>'U16','U19'=>'U19',
      ],
    ]);
    $refereeLevelAssist = new SelectView([
      'id'    => 'referee_level_assist',
      'name'  => 'referee_level_assist',
      'label' => 'Comfort Level to Assist: ',
      'value' => 'U14',
      'choices' => [
        'U10'=>'U10','U12'=>'U12','U14'=>'U14','U16'=>'U16','U19'=>'U19',
      ],
    ]);
    $assessmentRequest = new RadioChoiceView([
      'label' => 'Assessment Request',
      'id'    => 'assessment_request',
      'name'  => 'assessment_request',
      'value' => $projectPerson['assessment_request'],
      'choices' => [
        'none'     => 'None',
        'informal' => 'Informal',
        'formal'   => 'Formal',
      ],
    ]);
    $lodgingNights = new CheckBoxChoiceView([
      'id'     => 'lodging_nights',
      'name'   => 'lodging_nights',
      'label'  => 'Lodging Nights',
      'class'  => 'radio-medium',
      'value'  => [ '20150411', ],
      'choices' => [
        '20150410' => 'Fri',
        '20150411' => 'Sat',
        '20150412' => 'Sun',
      ],
    ]);
    $lodgingWith = new TextInputView([
      'id'     => 'lodging_with',
      'name'   => 'lodging_with',
      'label'  => 'Lodging With',
    ]);
    $travelingWith = new TextInputView([
      'id'     => 'traveling_with',
      'name'   => 'traveling_with',
      'label'  => 'Traveling With',
    ]);
    $travelingFrom = new TextInputView([
      'id'     => 'traveling_from',
      'name'   => 'traveling_from',
      'label'  => 'Traveling From',
    ]);

    $formView = new FormView([
      'action' => sprintf('/project-person/%d/edit',$projectPerson['id']),
      'method' => 'POST',
      'class'  => 'project-person-edit'
    ]);

    return <<<TYPEOTHER
<form{$formView->renderAttrs()}>
<fieldset>
  <legend><span>Level</span></legend>
  <div>{$refereeLevel->render()}</div>
  <div>{$refereeLevelCenter->render()}</div>
  <div>{$refereeLevelAssist->render()}</div>
  <div>{$assessmentRequest->render()}</div>
</fieldset>
<fieldset>
  <legend><span>Lodging and Travel</span></legend>
  <div>{$lodgingNights->render()}</div>
  <div>{$lodgingWith  ->render()}</div>
  <div>{$travelingWith->render()}</div>
  <div>{$travelingFrom->render()}</div>
</fieldset>
<div><button type="submit">Register</button></div>
</form>
TYPEOTHER;

  }
}