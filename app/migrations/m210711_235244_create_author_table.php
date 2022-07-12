<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m210711_235244_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30)->notNull(),
            'access_token' => $this->string(30)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
