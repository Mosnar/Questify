<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 12:50 AM
 */

class HomeController extends ControllerBase {

    private function getCompanyFromHandle($handle) {

    }

    public function indexAction() {
        $compHandle = $this->dispatcher->getParam('company');
        if ($comp = self::getCompany($compHandle)) {
            // Make sure they're logged in on facebook
            self::checkNoFbUserLogin($compHandle);

            $this->view->user = $this->auth->getUser();
            $this->view->quests = self::getQuests();
            $this->view->company = $comp;

        } else {
            $this->response->redirect("index/index");
            $this->flash->error("Company doesn't exist, sorry!");
            $this->view->disable();
            return;
        }
    }

    private function getQuests() {
        $quests = Quests::find(array(
            'company_id' => self::getCompanyId()
        ));

        return $quests;
    }

    private function getCompanyId() {
        return $this->auth->getUser()->company_id;
    }

    private function getCompany($handle) {
        $comp = Companies::findFirst(array(
            'handle' => $handle
        ));
        return $comp;

    }
}