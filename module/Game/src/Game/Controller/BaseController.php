<?php

namespace Game\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\Session\Container;
use Zend\EventManager\EventManagerInterface;
use Zend\View\Model\ViewModel;
use Zend\Mail;

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
                $controller->layout()->setVariables(array('userName' => $sessionData['userName']));

                $userRole = $controller->getTable('Users')->getUserRole($sessionData['userId']);

                $actionName = $this->params('action');
                if ($actionName == 'index' && $userRole == 'Seller') {

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

    public function sendMail($emails, $emailDescription, $subject)
    {
        $mail = new Mail\Message();
        $mail->setBody($emailDescription);
        $mail->setFrom('info@test.com', 'Testing');

        if (is_array($emails)) {
            foreach ($emails as $key => $value) {
                $mail->addTo($value);
            }
        } else {
            $mail->addTo($emails);
        }
        $mail->setSubject($subject);

        $transport = new Mail\Transport\Sendmail();
        $transport->send($mail);
    }
}
