<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%state_book}}`.
 */
class m240228_215610_create_state_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%state_book}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(63)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%state_book}}');
    }
}
