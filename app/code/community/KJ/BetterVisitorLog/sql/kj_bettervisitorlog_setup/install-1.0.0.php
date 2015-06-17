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
    254
);

$table->addColumn(
    'product_id',
    Varien_Db_Ddl_Table::TYPE_INTEGER,
    null
);

$table->addColumn(
    'ip_address',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    46
);

$table->addColumn(
    'x_forwarded_for',
    Varien_Db_Ddl_Table::TYPE_VARCHAR,
    46
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
    $table->addIndex('IDX_KJ_BETTERVISITORLOG_EMAIL', array('email'));
    $table->addIndex('IDX_KJ_BETTERVISITORLOG_PRODUCT_ID', array('product_id'));
    $table->addIndex('IDX_KJ_BETTERVISITORLOG_CREATED_AT', array('created_at'));
    $this->getConnection()->createTable($table);
} catch (Exception $e) {
    Mage::logException($e);
}

$this->endSetup();