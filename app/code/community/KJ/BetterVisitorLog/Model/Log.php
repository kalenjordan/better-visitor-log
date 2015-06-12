<?php

/**
 * @method getCreatedAt()
 * @method KJ_BetterVisitorLog_Model_Log setCreatedAt($value)
 */
class KJ_BetterVisitorLog_Model_Log extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('kj_bettervisitorlog/log');
    }
}