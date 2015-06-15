<?php

class KJ_BetterVisitorLog_Helper_Data extends Mage_Core_Helper_Data
{
    public function getAjaxBaseUrl()
    {
        $base = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_LINK, $this->_getRequest()->isSecure());
        $base .= "kjbvl";

        return $base;
    }

    public function currentProductId()
    {
        $product = Mage::registry('current_product');
        if (!($product instanceof Mage_Catalog_Model_Product)) {
            return null;
        }

        return $product->getId();
    }

    public function isLocalLoggingEnabled()
    {
        return Mage::getStoreConfig('system/kj_bettervisitorlog/enable_local_logging', Mage::app()->getStore());
    }

    public function isMixpanelLoggingEnabled()
    {
        return Mage::getStoreConfig('system/kj_bettervisitorlog/enable_mixpanel', Mage::app()->getStore());
    }

    public function isConsoleLoggingEnabled()
    {
        return Mage::getStoreConfig('system/kj_bettervisitorlog/enable_console_logging', Mage::app()->getStore());
    }

    public function getMixpanelToken()
    {
        return Mage::getStoreConfig('system/kj_bettervisitorlog/mixpanel_token', Mage::app()->getStore());
    }

    public function getLoggedInCustomerEmail()
    {
        if (! Mage::getSingleton('customer/session')->isLoggedIn()) {
            return null;
        }

        $customer = Mage::getSingleton('customer/session')->getCustomer();
        if (! $customer || ! ($customer instanceof Mage_Customer_Model_Customer)) {
            return null;
        }

        return $customer->getData('email');
    }
}