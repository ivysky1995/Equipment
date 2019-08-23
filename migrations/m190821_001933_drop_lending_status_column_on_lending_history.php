<?php

use yii\db\Migration;

/**
 * Class m190821_001933_drop_lending_status_column_on_lending_history
 */
class m190821_001933_drop_lending_status_column_on_lending_history extends Migration
{
    protected $table = 'lending_history';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn($this->table,'borrower_name',$this->string());
        $this->alterColumn($this->table,'equipment_id',$this->integer()->notNull());
        $this->dropColumn($this->table,'lending_status');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn($this->table,'lending_status',$this->integer());
        $this->alterColumn($this->table,'equipment_id',$this->integer());
        $this->dropColumn($this->table,'borrower_name');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_001933_drop_lending_status_column_on_lending_history cannot be reverted.\n";

        return false;
    }
    */
}
