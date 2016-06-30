<?php

namespace Game\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\Session\Container;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ViewModel;

class BaseController extends AbstractActionController implements EventManagerAwareInterface
{

    public function setEventManager(EventManagerInterface $events)
    {   
        parent::setEventManager($events);
        $controller = $this;
       
        $events->attach('dispatch', function ($e) use ($controller) {
            $sessionData = new Container('user');

            if ($controller->zfcUserAuthentication()->hasIdentity()) {

                $sessionData['isLoggedIn'] = true;

                $identity = $controller->zfcUserAuthentication()->getIdentity();
                $sessionData['userId'] = $identity->getId();
                $sessionData['userName'] = $identity->getFirstname() . ' ' . $identity->getLastname();

                $controller->layout('game/layout');
                $controller->layout()->setVariables(array('userName' => $sessionData['userName'] ));

                $userRole = $controller->getTable('Users')->getUserRole($sessionData['userId']);

                $actionName = $this->params('action');
                if($actionName == 'index' && $userRole == 'Seller'){
                    return $controller->redirect()->toRoute('sellerhome');
                } elseif ($actionName == 'index' && $userRole == 'Buyer') {
                    return $controller->redirect()->toRoute('buyerhome');
                }

            } else {
                return $controller->redirect()->toRoute('zfcuser');

            }
        });
    }
    

    public function getTable($tableName)
    {
        $tableName = 'Game\Model\/' . $tableName . 'Table';
        $sm = $this->getServiceLocator();
        $controllerTable = $sm->get($tableName);

        return $controllerTable;
    }

    public function sendmailAction() {
        session_start();
        try {
            $emails = "info@testing.com";
            $useremail = $_POST['email'];
            $name = $_POST['name'];
            $message = $_POST['message'];
            $emailDescription = "Name : " . $name . "\n" . "email :" . $useremail . "\n" . "Message :" . $message;
            $subject = "We have new contact - " . $name;
            $captcha = $_POST['captcha'];
            if (isset($_POST["captcha"]) && $_POST["captcha"] != "" && $_SESSION["code"] == $_POST["captcha"]) {
                $adminBase = new \Admin\Controller\BaseController();
                $adminBase->sendMail($emails, $emailDescription, $subject);

                return new JsonModel(['success']);
            } else {

                return new JsonModel(['failure', $_SESSION]);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
