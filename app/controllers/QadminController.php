<?php
/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 12:50 AM
 */

class QadminController extends ControllerBase {

    public function indexAction() {
        $this->response->redirect("qadmin/manage");
        $this->view->disable();
        return;
    }

    public function manageAction() {
        self::setPageTitle("Manage Quests");
        $this->view->quests = self::getQuests();
    }

    public function viewAction() {
        $reqId = intval($this->dispatcher->getParam('id'));
        $compId = self::getCompanyId();
        $quest = Quests::findFirst(
            array("id='$reqId'",
                "company_id='$compId'"));

        if($quest) {
            $this->view->quest = $quest;
        } else {
            $this->flash->error("Quest not found");
            $this->response->redirect("qadmin/manage");
            $this->view->disable();
        }
    }

    public function createAction() {
        self::setPageTitle("Quest Creator");
        $form = new CreateQuestForm();
        if ($_POST) {
            if ($form->isValid($_POST)) {
                $quest = new Quests();
                $quest->company_id = self::getCompanyId();
                $quest->name = $this->request->getPost('name','string');
                $quest->objective = $this->request->getPost('objective','string');
                $quest->experience_points_earned = $this->request->getPost('points_earned','string');
                $quest->experience_points_required = $this->request->getPost('points_required','string');
                if($this->request->getPost('require_text') == 1) {
                    $quest->text_required = 1;
                } else {
                    $quest->text_required = 0;
                }

                if($this->request->getPost('require_image') == 1) {
                    $quest->image_required = 1;
                } else {
                    $quest->image_required = 0;
                }

                if($quest->save()) {
                    $this->flash->success("Quest Created");
                    $this->response->redirect("qadmin/manage");
                    $this->view->disable();
                    return;
                } else {
                    $this->flash->error("Quest Creation Failed: <br />". $quest->getMessages());
                    $this->response->redirect("qadmin/manage");
                    $this->view->disable();
                    return;
                }
            }
        }
        $this->view->form = $form;
    }

    public function deleteAction() {
        $reqId = intval($this->dispatcher->getParam('id'));
        $compId = self::getCompanyId();
        $quest = Quests::findFirst(
            array("id='$reqId'",
                "company_id='$compId'"));

        if($quest) {
            if ($quest->delete()) {
                $this->flash->success("Quest deleted!");
                $this->response->redirect("qadmin/manage");
                $this->view->disable();
            } else {
                $this->flash->error("Couldn't delete quest. Contact an administrator.");
                $this->response->redirect("qadmin/manage");
                $this->view->disable();
            }
        } else {
            $this->flash->error("Quest not found");
            $this->response->redirect("qadmin/manage");
            $this->view->disable();
        }
    }

    // Helper functions
    private function getCompany() {
        $comp = Companies::findFirst($this->auth->getUser()->company_id);
        return $comp;

    }
    private function getCompanyId() {
        return $this->auth->getUser()->company_id;
    }

    private function getQuests() {
        $compId = self::getCompanyId();
        $quests = Quests::find(array(
            "company_id='$compId'"));

        return $quests;
    }
}