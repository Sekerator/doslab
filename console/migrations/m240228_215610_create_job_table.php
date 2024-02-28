<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%job}}`.
 */
class m240228_215610_create_job_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%job}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(63)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%job}}');
    }
}
