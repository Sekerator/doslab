<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sale_book}}`.
 */
class m240228_215858_create_sale_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sale_book}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer()->notNull(),
            'client_id' => $this->integer()->notNull(),
            'employee_id' => $this->integer()->notNull(),
            'deadline' => $this->integer()->notNull(),
            'created_at' => $this->integer()
        ]);

        $this->createIndex(
            'idx-sale_book-book_id',
            'sale_book',
            'book_id'
        );

        $this->addForeignKey(
            'fk-sale_book-book_id',
            'sale_book',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-sale_book-client_id',
            'sale_book',
            'client_id'
        );

        $this->addForeignKey(
            'fk-sale_book-client_id',
            'sale_book',
            'client_id',
            'client',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-sale_book-employee_id',
            'sale_book',
            'employee_id'
        );

        $this->addForeignKey(
            'fk-sale_book-employee_id',
            'sale_book',
            'employee_id',
            'employee',
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
            'fk-sale_book-book_id',
            'sale_book'
        );

        $this->dropIndex(
            'idx-sale_book-book_id',
            'sale_book'
        );

        $this->dropForeignKey(
            'fk-sale_book-client_id',
            'sale_book'
        );

        $this->dropIndex(
            'idx-sale_book-client_id',
            'sale_book'
        );

        $this->dropForeignKey(
            'fk-sale_book-employee_id',
            'sale_book'
        );

        $this->dropIndex(
            'idx-sale_book-employee_id',
            'sale_book'
        );

        $this->dropTable('{{%sale_book}}');
    }
}
