<?php

use yii\db\Migration;

/**
 * Class m190821_001814_make_employee_not_null
 */
class m190821_001814_make_employee_not_null extends Migration
{
    protected $table = 'employee';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn($this->table, 'name', $this->string()->notNull());
        $this->addColumn($this->table, 'employee_no', $this->string());
        $this->addColumn($this->table, 'working_status', $this->integer());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn($this->table,'working_status');
        $this->dropColumn($this->table,'employee_no');
        $this->alterColumn($this->table,'name',$this->string());

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190821_001814_make_employee_not_null cannot be reverted.\n";

        return false;
    }
    */
}
