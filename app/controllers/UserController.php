<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/25/14
 * Time: 8:21 PM
 */
class UserController extends ControllerBase
{


    public function loginAction() {

        self::checkCompanyLogin();
        self::setPageTitle("Company Login");
        $form = new CompanyLoginForm();

        $this->view->loginError = false;

        if ($form->isValid($_POST)) {
            $email = $this->request->getPost('email','email');
            $pass  = $this->request->getPost('password');
            if($this->auth->logInEmail($email, $pass)) {
                $this->response->redirect("dashboard");
                $this->view->disable();
                return;

            } else {
                $this->view->loginError = true;
            }
        }
        $this->view->form = $form;
    }


    public function registerAction() {
        self::checkCompanyLogin();
        self::setPageTitle("Register");
        $form = new CompanyRegisterForm();
        if ($_POST) {
            if ($form->isValid($_POST)) {

                $user = new Users();
                $company = new Companies();

                $company->datetime = time();
                $company->name = $this->request->getPost('company_name','string');
                $company->description = $this->request->getPost('description','string');
                $company->handle = $this->request->getPost('handle','string');
                $company->user_id = 0;

                if(!$company->save()) {
                    die("something went wrong making the company: ".$company->getMessages());
                }

                $user->facebook_id = "0";
                $user->account_type = 1;
                $user->ip = $this->request->getClientAddress();
                $user->points_balance = 0;
                $user->company_id = $company->id;
                $user->password = $this->security->hash($this->request->getPost('password'));
                $user->points_retro = 0;
                $user->email = $this->request->getPost('email','email');

                if(!$user->save()) {
                    die("something went wrong making the user: ".$company->getMessages());
                }

                $company->user_id = $user->id;
                $company->save();

                if($this->auth->logIn($user->id)) {
                    self::checkCompanyLogin();
                } else {
                    die("failed to login");
                }
            }
        }
        $this->view->form = $form;
    }

    public function logoutAction() {
        if($user = $this->auth->getUser()) {
            $this->auth->logOut();
        }
        if($user->account_type == 1) {
            $this->response->redirect("index");
            $this->view->disable();
            return;
        } else {
            $compId = $user->company_id;
            $company = Companies::findFirst("id = '${compId}'");
            if($company) {
                $this->response->redirect("index/index");
            } else {
                $this->response->redirect("index");
            }
            $this->view->disable();
            return;
        }

    }
}
