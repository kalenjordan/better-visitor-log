<?php
/* @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();
$table = $this->getConnection()->newTable($this->getTable('kj_bettervisitorlog/log'));

$table->addColumn(
    'log_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    null,
    array(
        'identity' => true,
        'primary'  => true,
        'unsigned' => true,
        'nullable' => false,
    )
);

$table->addColumn(
    'created_at',
    Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
    null
);

/*
 * Finish creating fields:
ip_address
x_forwarded_for
created_at
product_id
user_agent
email
 */

try {
    $this->getConnection()->createTable($table);
} catch (Exception $e) {
    Mage::log("Test");
}

$this->endSetup();