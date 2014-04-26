<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 12:07 AM
 */

class DashboardController extends ControllerBase {

    public function initialize() {
        if(!$this->auth->isCompanyUser()) {
            $this->response->redirect("company-login");
            $this->view->disable();
            return;
        }
        parent::initialize();
    }

    public function indexAction() {
        self::setPageTitle("Dashboard");
        $this->view->numUsers = count(self::getCompanyUsers());
        $this->view->numQuests = count(self::getQuests());
        $this->view->numSubs = count(self::getSubmissions());
        $this->view->numOrders = count(self::getOrders());
        $this->view->company = self::getCompany();

    }


    // Helper functions
    private function getCompany() {
        $comp = Companies::findFirst($this->auth->getUser()->company_id);
        return $comp;

    }
    private function getCompanyId() {
        return $this->auth->getUser()->company_id;
    }

    private function getOrders() {
        $orders = Orders::find(array(
            'company_id' => self::getCompanyId()
        ));
        return $orders;
    }

    private function getCompanyUsers() {
        $users = Users::find(array(
            'company_id' => self::getCompanyId(),
        ));

        return $users;
    }

    private function getQuests() {
    $quests = Quests::find(array(
            'company_id' => self::getCompanyId()
        ));

        return $quests;
    }

    private function getSubmissions() {
        $subs = Submissions::find(array(
            'company_id' => self::getCompanyId(),
            'approved'   => 0
        ));

        return $subs;
    }
} 