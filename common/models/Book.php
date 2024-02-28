<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $name
 * @property string $article
 * @property string $author
 * @property int|null $admission_date
 *
 * @property SaleBook[] $saleBooks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'article', 'author'], 'required'],
            [['admission_date'], 'default', 'value' => null],
            [['admission_date'], 'integer'],
            [['name', 'author'], 'string', 'max' => 127],
            [['article'], 'string', 'max' => 63],
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['admission_date'],
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
            'name' => 'Название',
            'article' => 'Артикул',
            'author' => 'Автор',
            'admission_date' => 'Дата поступления',
        ];
    }

    /**
     * Gets query for [[SaleBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleBooks()
    {
        return $this->hasMany(SaleBook::class, ['book_id' => 'id']);
    }
}
