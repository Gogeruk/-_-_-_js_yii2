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
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_review}}');
    }
}
