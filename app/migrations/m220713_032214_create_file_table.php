<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m220713_032214_create_file_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%file}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'path' => $this->string(255)->notNull(),
            'user_review_id' => $this->integer()->null(),
        ]);

        $this->createIndex(
            'idx-file-user_review_id',
            'file',
            'user_review_id'
        );

        $this->addForeignKey(
            'fk-file-user_review_id',
            'file',
            'user_review_id',
            'user_review',
            'id',
            'SET NULL'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-file-user_review_id',
            'file'
        );

        $this->dropIndex(
            'idx-file-user_review_id',
            'file'
        );

        $this->dropTable('{{%file}}');
    }
}
