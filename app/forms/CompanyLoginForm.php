<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/25/14
 * Time: 8:24 PM
 */

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Text,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Identical;

class CompanyLoginForm extends Form {

    public function initialize($user) {
        $this->setEntity($this);
        $email = new Text("email", array(
            'class' => 'form-control',
            'placeholder' => 'Email Address'
        ));
        $password = new Password("password", array(
            'class' => 'form-control',
            'placeholder' => 'Password'
        ));

        $csrf = new Hidden('csrf');

        $email->addValidator(new PresenceOf(array(
            'message' => 'The email is required'
        )));

        $password->addValidator(new PresenceOf(array(
            'message' => 'Password is required'
        )));

        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));

        $this->add($email);
        $this->add($password);
        $this->add($csrf);

        $this->add(new Submit("submit", array(
            'class' => 'btn btn-lg btn-primary btn-block',
            'value' => 'Login'
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