<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 3:53 PM
 */


use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\File,
    Phalcon\Forms\Element\TextArea,
    Phalcon\Forms\Element\Check,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\Between,
    Phalcon\Validation\Validator\StringLength,
    Phalcon\Validation\Validator\Identical,
    Phalcon\Validation\Validator\Regex;

class QuestSubmitForm extends Form {

    public function initialize($quest) {
        $this->setEntity($this);


        $objective = new TextArea("body", array(
            'class' => 'form-control',
            'placeholder' => ''
        ));


        $file = new File("file", array(
            'class' => 'form-control',
        ));



        $this->add($objective);
        $this->add($file);

        $this->add(new Submit("submit", array(
            'class' => 'btn btn-lg btn-primary btn-block',
            'value' => 'Submit'
        )));
    }


    public function messages($name)
    {
        if ($this->hasMessagesFor($name)) {
            return $this->getMessagesFor($name);
        }
    }
}