<?php

/**
 * Proj: quest
 * User: Ransom
 * Date: 4/26/14
 * Time: 4:10 PM
 */
class QuestController extends ControllerBase
{
    public function viewAction()
    {
        $form = new QuestSubmitForm();
        $userid = $this->auth->getUser()->id;
        $reqId = intval($this->dispatcher->getParam('id'));
        if ($quest = Quests::findFirst($reqId)) {
            if ($sub = Submissions::findFirst(array(
                "'quest_id'=$reqId",
                "'user_id'=$userid"
            ))) {
                $this->view->submitted = 1;
            } else {
                $this->view->submitted = 0;


            }

            if ($_POST) {
                $form = new QuestSubmitForm();
                if ($form->isValid($_POST)) {
                    $sub = new Submissions();
                    $sub->quest_id = $quest->id;
                    $sub->user_id = $userid;
                    $sub->image_id = 0;
                    $sub->approved = 0;
                    $sub->datetime = 0;
                    if ($quest->text_required == 1) {
                        $sub->body = $this->request->getPost('body');
                    } else {
                        $sub->body = 0;
                    }
                    if ($sub->save()) {
                        $this->flash->success("Submission accepted");
                        $this->response->redirect("home/index/coke");
                        $this->view->disable();
                        return;
                    } else {
                        $this->flash->error("Failed to submit");
                        $this->response->redirect("home/index/coke");
                        $this->view->disable();
                        return;
                    }
                } else {
                    foreach($form->getMessages() as $msg) {
                        $this->flash->error($msg);
                    }
                        $this->response->redirect("index/index");
                        $this->view->disable();

                 }
            }

            $comp = Companies::findFirst($quest->company_id);
            $this->view->company = $comp;
            $this->view->quest = $quest;

        } else {
            $this->flash->error("Quest not found");
            // Change me.
            $this->response->redirect("home/index/coke");
            $this->view->disable();
            return;
        }

        $this->view->form = $form;
    }
}