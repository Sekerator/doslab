<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string|null $middlename
 * @property string $passport
 *
 * @property SaleBook[] $saleBooks
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'passport'], 'required'],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 63],
            [['passport'], 'string', 'max' => 31],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'middlename' => 'Отчество',
            'passport' => 'Паспорт',
        ];
    }

    /**
     * Gets query for [[SaleBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleBooks()
    {
        return $this->hasMany(SaleBook::class, ['client_id' => 'id']);
    }
}
