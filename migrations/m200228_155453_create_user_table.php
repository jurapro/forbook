<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m200228_155453_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string(50)->notNull(),
            'username' => $this->string(30)->notNull(),
            'email' => $this->string(30)->notNull(),
            'password' => $this->string()->notNull(),
            'role' => $this->integer()->defaultValue(0)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
