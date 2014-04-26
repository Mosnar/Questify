<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 12:40 PM
 */

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Text,
    Phalcon\Forms\Element\TextArea,
    Phalcon\Forms\Element\Check,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Between,
    Phalcon\Validation\Validator\StringLength,
    Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\Regex;

class CreateQuestForm extends Form {

    public function initialize($quest) {
        $this->setEntity($this);

        $name = new Text("name", array(
            'class' => 'form-control',
            'placeholder' => 'Quest Name'
        ));

        $objective = new TextArea("objective", array(
            'class' => 'form-control',
            'placeholder' => 'Objective'
        ));

        $points_required = new Text("points_required", array(
            'class' => 'form-control'
        ));

        $points_earned = new Text("points_earned", array(
            'class' => 'form-control'
        ));

        $image_required = new Check("require_image", array(
            'value' => 1
        ));

        $text_required = new Check("require_text", array(
            'checked' => 1,
            'value' => 1
        ));

        $csrf = new Hidden('csrf');

        // Presence of Validators go here
        $name->addValidator(new PresenceOf(array(
            'message' => 'The quest name is required'
        )));

        $objective->addValidator(new PresenceOf(array(
            'message' => 'The quest objective is required'
        )));

        $points_required->addValidator(new PresenceOf(array(
            'message' => 'The points required is required'
        )));

        $points_earned->addValidator(new PresenceOf(array(
            'message' => 'The points earned is required'
        )));

        $points_required->addValidator(new Between(array(
            'minimum' => 0,
            'maximum' => 1000,
            'message' => 'Points required must be between 0 and 1000'
        )));

        $points_earned->addValidator(new Between(array(
            'minimum' => 0,
            'maximum' => 1000,
            'message' => 'Points earned must be between 0 and 1000'
        )));

        $points_required->addValidator(new Regex(array(
            'pattern' => '/^[0-9]+$/',
            'message' => 'Points required must be a number'
        )));

        $points_earned->addValidator(new Regex(array(
            'pattern' => '/^[0-9]+$/',
            'message' => 'Points earned must be a number'
        )));

        $objective->addValidator(new StringLength(array(
            'min' => 5,
            'max' => 5000,
            'message' => 'Objective must be between 5 and 5000 characters'
        )));

        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));


        $this->add($name);
        $this->add($objective);
        $this->add($points_earned);
        $this->add($points_required);
        $this->add($image_required);
        $this->add($text_required);
        $this->add($csrf);

        $this->add(new Submit("submit", array(
            'class' => 'btn btn-lg btn-primary btn-block',
            'value' => 'Create'
        )));
    }

    /**
     * This method returns the default value for field 'csrf'
     */
    public function getCsrf()
    {
        return $this->security->getToken();
    }

    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            return $this->getMessagesFor($name);
        }
    }
}