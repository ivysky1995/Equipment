<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lending_history}}`.
 */
class m190816_004347_create_lending_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    protected $table = '{{%lending_history}}';
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'employee_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'lending_date' => $this->date(),
            'return_date' => $this->date(),
            'remarks' => $this->text(),
            'lending_status' => $this->integer(),
        ]);
        $this->addForeignKey('lending_history-employee_id-fkey', $this->table, 'employee_id', 'employee', 'id');
        $this->addForeignKey('lending_history-equipment_id-fkey', $this->table, 'equipment_id', 'equipment', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lending_history}}');
    }
}
