<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/25/14
 * Time: 10:35 PM
 */

use Phalcon\Forms\Form,
    Phalcon\Forms\Element\Password,
    Phalcon\Forms\Element\Hidden,
    Phalcon\Forms\Element\Submit,
    Phalcon\Forms\Element\Text,
    Phalcon\Validation\Validator\PresenceOf,
    Phalcon\Validation\Validator\StringLength,
    Phalcon\Validation\Validator\Email,
    Phalcon\Validation\Validator\Regex,
    Phalcon\Validation\Validator\Identical;

class CompanyRegisterForm extends Form {

    public function initialize($user, $company) {
        $this->setEntity($this);

        $email = new Text("email", array(
            'class' => 'form-control',
            'placeholder' => 'Email Address'
        ));

        $password = new Password("password", array(
            'class' => 'form-control',
            'placeholder' => 'Password'
        ));

        $companyName = new Text("company_name", array(
            'class' => 'form-control',
            'placeholder' => 'Company Name'
        ));

        $description = new Text("description", array(
            'class' => 'form-control',
            'placeholder' => 'Short description'
        ));

        $handle = new Text("handle", array(
            'class' => 'form-control',
            'placeholder' => 'Pick a handle for your quest site'
        ));

        $csrf = new Hidden('csrf');

        $email->addValidator(new PresenceOf(array(
            'message' => 'The email is required'
        )));

        $email->addValidator(new Email(array(
            'message' => 'Invalid email address'
        )));

        $password->addValidator(new PresenceOf(array(
            'message' => 'A password is required'
        )));

        $companyName->addValidator(new PresenceOf(array(
            'message' => 'Company name is required'
        )));

        $description->addValidator(new PresenceOf(array(
            'message' => 'A description is required'
        )));

        $handle->addValidator(new PresenceOf(array(
            'message' => 'A handle is required'
        )));

        $handle->addValidator(new Regex(array(
            'pattern' => '/^[a-z0-9]+$/',
            'message' => 'Your handle must be alphanumeric and not contain spaces'
        )));

        $csrf->addValidator(new Identical(array(
            'value' => $this->security->getSessionToken(),
            'message' => 'CSRF validation failed'
        )));

        $this->add($email);
        $this->add($password);
        $this->add($companyName);
        $this->add($description);
        $this->add($handle);
        $this->add($csrf);

        $this->add(new Submit("submit", array(
            'class' => 'btn btn-lg btn-primary btn-block',
            'value' => 'Register'
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