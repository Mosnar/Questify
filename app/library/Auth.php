<?php

class Auth extends Phalcon\Mvc\User\Component {

    public function logIn($uid) {
        $user = Users::findFirst("id = '$uid'");
        if ($user)
        {
            $this->session->set("user_id", $uid);
            return true;
        }
        return false;
    }

    public function logInEmail($email, $pass) {
        $user = Users::findFirst("email = '$email'");
        if ($user &&
            $this->security->checkHash($pass, $user->password))
        {
            $this->session->set("user_id", $user->id);
            return true;
        }
        return false;
    }

    public function logInFacebook($uid) {
        $result = Users::find("facebook_id = '$uid'");
        if ($result)
        {
            $user = $result->getFirst();
            if ($user)
            {
                $this->session->set("user_id", $user->id);
                return true;
            }
        }
        return false;
    }

    public function logOut() {
        $this->session->remove("user_id");
        $this->session->destroy();
    }

    public function loggedIn() {
        return ($this->getUser() != null);
    }

    public function getUser() {
        if (!$this->session->has("user_id"))
        {
            return false;
        }

        $uid = $this->session->get("user_id");
        $result = Users::find("id = '$uid'");
        if ($result)
        {
            $user = $result->getFirst();
            if ($user )
            {
                return $user;
            }
        }
        return false;
    }

    public function isCompanyUser() {
        if (self::loggedIn()) {
            if (self::getUser()->account_type == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function isFbUser() {
        if (self::loggedIn()) {
            if (self::getUser()->account_type == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}