<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 * - `{{%user}}`
 */
class m200228_161057_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'id_category' => $this->integer()->notNull(),
            'id_user' => $this->integer()->notNull(),
            'name' => $this->string(),
            'description' => $this->text(),
            'photo_to' => $this->string(),
            'status' => $this->integer()->defaultValue(0),
            'datetime' => $this->timestamp(),
            'description_denied' => $this->text(),
            'photo_after' => $this->string(),
        ]);

        // creates index for column `id_category`
        $this->createIndex(
            '{{%idx-request-id_category}}',
            '{{%request}}',
            'id_category'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-request-id_category}}',
            '{{%request}}',
            'id_category',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-request-id_user}}',
            '{{%request}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-request-id_user}}',
            '{{%request}}',
            'id_user',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-request-id_category}}',
            '{{%request}}'
        );

        // drops index for column `id_category`
        $this->dropIndex(
            '{{%idx-request-id_category}}',
            '{{%request}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-request-id_user}}',
            '{{%request}}'
        );

        // drops index for column `id_user`
        $this->dropIndex(
            '{{%idx-request-id_user}}',
            '{{%request}}'
        );

        $this->dropTable('{{%request}}');
    }
}
