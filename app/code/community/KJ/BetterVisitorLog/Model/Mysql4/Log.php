<?php

class KJ_BetterVisitorLog_Model_Mysql4_Log extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('kj_bettervisitorlog/log', 'log_id');
    }
}