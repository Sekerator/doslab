<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%client}}`.
 */
class m240228_215640_create_client_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%client}}', [
            'id' => $this->primaryKey(),
            'firstname' => $this->string(63)->notNull(),
            'lastname' => $this->string(63)->notNull(),
            'middlename' => $this->string(63),
            'passport' => $this->string(31)->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%client}}');
    }
}
