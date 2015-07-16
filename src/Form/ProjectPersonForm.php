<?php
namespace Cerad\Component\Form;

use Cerad\Component\View\SelectView;
use Cerad\Component\View\RadioChoiceView;

class ProjectPersonForm
{
  protected $state = [
  ];

  public function render()
  {
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
      'value' => 'none',
      'choices' => [
        'none'     => 'None',
        'informal' => 'Informal',
        'formal'   => 'Formal',
      ],
    ]);
    return <<<TYPEOTHER
<form method="post" class="project-person-edit" action="/project/19/person/42/edit">
<fieldset>
  <legend><span>Level</span></legend>
  <div>{$refereeLevel->render()}</div>
  <div>{$refereeLevelCenter->render()}</div>
  <div>{$refereeLevelAssist->render()}</div>
</fieldset>
<fieldset>
  <legend><span>Lodging and Travel</span></legend>
  <div><label>Assessment Request</label>
    <div id="form_basic_requestAssessment" class="radio-medium" >
      <input type="radio" id="form_basic_requestAssessment_0" name="form[basic][requestAssessment]" value="None" checked="checked" />
      <label for="form_basic_requestAssessment_0">None</label>
      <input type="radio" id="form_basic_requestAssessment_1" name="form[basic][requestAssessment]" value="Informal" />
      <label for="form_basic_requestAssessment_1">Informal</label>
      <input type="radio" id="form_basic_requestAssessment_2" name="form[basic][requestAssessment]" value="Formal" />
      <label for="form_basic_requestAssessment_2">Formal</label>
    </div>
  </div>
</fieldset>
<div><button type="submit">Register</button></div>
</form>
TYPEOTHER;

  }
}