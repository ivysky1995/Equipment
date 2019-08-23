<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m190823_074950_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    protected $table = 'user';
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name'=>$this->string(),
            'email' =>$this->string(),
            'password' =>$this->string(),
            'authKey' =>$this->string(),
            'accessToken' =>$this->string(),
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
