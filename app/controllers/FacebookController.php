<?php

/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 2:22 PM
 */
class FacebookController extends ControllerBase
{
    public function loginAction()
    {
        $this->view->loginUrl = $this->facebook->getLoginUrl();

        $compHandle = $this->dispatcher->getParam('company');

        $comp = Companies::findFirst("handle = '${compHandle}'");
        if ($comp) {
            if ($this->auth->isFbUser()) {
                $this->response->redirect("home/index/" . $compHandle);
                $this->view->disable();
                return;
            } else {
                $fbUser = $this->facebook->getUser();
                if ($fbUser != 0) {
                    if($this->auth->logInFacebook($fbUser))
                    {
                        $this->response->redirect("home/index/".$compHandle);
                        $this->view->disable();
                        return;
                    } else {
                        $user =  new Users();

                        $user->facebook_id = $fbUser;
                        $user->account_type = 0;
                        $user->ip = $this->request->getClientAddress();
                        $user->points_balance = 0;
                        $user->company_id = $comp->id;
                        $user->password = "0";
                        $user->points_retro = 0;
                        $user->email = "0";
                        if ($user->save()) {
                            $this->response->redirect("home/index/".$compHandle);
                            $this->view->disable();
                            return;
                        } else {
                            $this->flash->error("Sorry, something went wrong while logging you in! Try again later.");
                            $this->response->redirect("facebook/login");
                            $this->view->disable();
                            return;
                        }
                    }
                } else {
                    // Do nothing - show view
                }
            }
    } else {
            $this->flash->error("Couldn't find company page! Perhaps it was removed?");
            $this->response->redirect("index/index");
            $this->view->disable();
            return;
        }


    }
}