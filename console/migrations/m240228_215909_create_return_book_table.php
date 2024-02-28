<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%return_book}}`.
 */
class m240228_215909_create_return_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%return_book}}', [
            'id' => $this->primaryKey(),
            'sale_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'state_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()
        ]);

        $this->createIndex(
            'idx-return_book-sale_id',
            'return_book',
            'sale_id'
        );

        $this->addForeignKey(
            'fk-return_book-sale_id',
            'return_book',
            'sale_id',
            'sale_book',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-return_book-employee_id',
            'return_book',
            'employee_id'
        );

        $this->addForeignKey(
            'fk-return_book-employee_id',
            'return_book',
            'employee_id',
            'employee',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-return_book-state_id',
            'return_book',
            'state_id'
        );

        $this->addForeignKey(
            'fk-return_book-state_id',
            'return_book',
            'state_id',
            'state_book',
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
            'fk-return_book-sale_id',
            'return_book'
        );

        $this->dropIndex(
            'idx-return_book-sale_id',
            'return_book'
        );

        $this->dropForeignKey(
            'fk-return_book-employee_id',
            'return_book'
        );

        $this->dropIndex(
            'idx-return_book-employee_id',
            'return_book'
        );

        $this->dropForeignKey(
            'fk-return_book-state_id',
            'return_book'
        );

        $this->dropIndex(
            'idx-return_book-state_id',
            'return_book'
        );

        $this->dropTable('{{%return_book}}');
    }
}
