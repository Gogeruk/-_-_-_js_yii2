<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_review}}`.
 */
class m220707_022707_create_user_review_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_review}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'email' => $this->string(255)->notNull(),
            'review' => $this->text()->notNull(),
            'rating' => $this->integer(5)->notNull(),
            'advantage' => $this->text()->null(),
            'disadvantage' => $this->text()->null(),
            'author_id' => $this->integer()->null(),
        ]);

        $this->createIndex(
            'idx-user_review-author_id',
            'user_review',
            'author_id'
        );

        $this->addForeignKey(
            'fk-user_review-author_id',
            'user_review',
            'author_id',
            'author',
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
            'fk-user_review-author_id',
            'user_review'
        );

        $this->dropIndex(
            'idx-user_review-author_id',
            'user_review'
        );
        
        $this->dropTable('{{%user_review}}');
    }
}
