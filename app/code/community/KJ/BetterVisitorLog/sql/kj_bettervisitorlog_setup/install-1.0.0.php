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
    'email',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    255
);

$table->addColumn(
    'product_id',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    null
);

$table->addColumn(
    'ip_address',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    null
);

$table->addColumn(
    'x_forwarded_for',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    null
);

$table->addColumn(
    'created_at',
    Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
    null,
    array(
        'nullable'  => false,
        'default'   => Varien_Db_Ddl_Table::TIMESTAMP_INIT,
    )
);

try {
    $this->getConnection()->createTable($table);
} catch (Exception $e) {
    Mage::logException($e);
}

$this->endSetup();