<?php

/**
 * @method getCreatedAt()
 * @method KJ_BetterVisitorLog_Model_Log setCreatedAt($value)
 * @method getEmail()
 * @method KJ_BetterVisitorLog_Model_Log setEmail($value)
 * @method getIpAddress()
 * @method KJ_BetterVisitorLog_Model_Log setIpAddress($value)
 * @method getXForwardedFor()
 * @method KJ_BetterVisitorLog_Model_Log setXForwardedFor($value)
 * @method getProductId()
 * @method KJ_BetterVisitorLog_Model_Log setProductId($value)
 */
class KJ_BetterVisitorLog_Model_Log extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('kj_bettervisitorlog/log');
    }
}