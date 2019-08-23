<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%system_user}}`.
 */
class m190822_001844_create_system_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'system_user';
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'username'=>$this->string(),
            'password'=>$this->string(),
            'email'=>$this->string(),
            'auth_key'=>$this->string(),
            'privileges'=>$this->integer(),
            'data_status'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
