<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employee}}`.
 */
class m240228_215611_create_employee_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'job_id' => $this->integer()->notNull(),
            'firstname' => $this->string(63)->notNull(),
            'lastname' => $this->string(63)->notNull(),
            'middlename' => $this->string(63),
        ]);

        $this->createIndex(
            'idx-employee-job_id',
            'employee',
            'job_id'
        );

        $this->addForeignKey(
            'fk-employee-job_id',
            'employee',
            'job_id',
            'job',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-employee-job_id',
            'employee'
        );

        $this->dropIndex(
            'idx-employee-job_id',
            'employee'
        );

        $this->dropTable('{{%employee}}');
    }
}
