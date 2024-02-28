<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "sale_book".
 *
 * @property int $id
 * @property int $book_id
 * @property int $client_id
 * @property int $employee_id
 * @property int $deadline
 * @property int|null $created_at
 *
 * @property Book $book
 * @property Client $client
 * @property Employee $employee
 * @property ReturnBook[] $returnBooks
 */
class SaleBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sale_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'client_id', 'employee_id', 'deadline'], 'required'],
            [['book_id', 'client_id', 'employee_id', 'deadline', 'created_at'], 'default', 'value' => null],
            [['book_id', 'client_id', 'employee_id', 'deadline', 'created_at'], 'integer'],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                ],
                'value' => new Expression('NOW()'),

            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Книга',
            'client_id' => 'Клиент',
            'employee_id' => 'Сотрудник',
            'deadline' => 'Срок выдачи',
            'created_at' => 'Дата выдачи',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Employee]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::class, ['id' => 'employee_id']);
    }

    /**
     * Gets query for [[ReturnBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBooks()
    {
        return $this->hasMany(ReturnBook::class, ['sale_id' => 'id']);
    }
}
