<?php

class KJ_BetterVisitorLog_LogController extends Mage_Core_Controller_Front_Action
{
    public function viewAction()
    {
        try {
            $this->_viewAction();
        } catch (Exception $e) {
            $message = "Exception";
            if (Mage::getIsDeveloperMode()) {
                $message .= ": " . $e->getMessage();
            }

            Mage::logException($e);
            $this->_jsonResponse(array(
                "success"           => false,
                "developer_mode"    => Mage::getIsDeveloperMode(),
                "message"           => $message,
            ));
        }
    }

    protected function _viewAction()
    {
        if (! $this->_validateView()) {
            return $this;
        }

        $log = Mage::getModel('kj_bettervisitorlog/log');
        $log->setEmail($this->getRequest()->getParam('email'))
            ->setIpAddress(Mage::helper('core/http')->getRemoteAddr())
            ->setXForwardedFor($this->getRequest()->getServer('HTTP_X_FORWARDED_FOR'))
            ->setProductId($this->getRequest()->getParam('product_id'))
            ->save();

        $response = array(
            "success"           => true,
            "developer_mode"    => Mage::getIsDeveloperMode(),
        );

        if (Mage::getIsDeveloperMode()) {
            $response['log_id'] = $log->getId();
        }

        $this->_jsonResponse($response);
        return $this;
    }

    protected function _validateView()
    {
        $email = $this->getRequest()->getParam('email');
        if (! $email) {
            $this->_jsonError("Email is missing");
            return false;
        }

        if (! Zend_Validate::is($email, 'EmailAddress')) {
            $this->_jsonError("Email doesn't look valid");
            return false;
        }

        return true;
    }

    protected function _jsonError($message)
    {
        $this->_jsonResponse(array(
            "success" => false,
            "message" => $message,
        ));
    }

    protected function _jsonResponse($data)
    {
        $this->getResponse()->clearHeaders()->setHeader('Content-type','application/json',true);
        $this->getResponse()->setBody(json_encode($data));

        return $this;
    }
}