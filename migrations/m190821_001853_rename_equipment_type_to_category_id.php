<?php

use yii\db\Migration;

/**
 * Class m190821_001853_rename_equipment_type_to_category_id
 */
class m190821_001853_rename_equipment_type_to_category_id extends Migration
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'equipment';
    public function safeUp()
    {
        $this->renameColumn($this->table, 'type', 'category_id');
        $this->alterColumn($this->table, 'category_id', $this->integer()->notNull());
        $this->alterColumn($this->table, 'name', $this->string()->notNull());
        $this->addColumn($this->table, 'equipment_status', $this->integer());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->table, 'equipment_status');
        $this->alterColumn($this->table, 'name', $this->string());
        $this->alterColumn($this->table, 'category_id', $this->integer());
        $this->renameColumn($this->table, 'category_id', 'type');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_001853_rename_equipment_type_to_category_id cannot be reverted.\n";

        return false;
    }
    */
}
