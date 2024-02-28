<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property int $job_id
 * @property string $firstname
 * @property string $lastname
 * @property string|null $middlename
 *
 * @property Job $job
 * @property ReturnBook[] $returnBooks
 * @property SaleBook[] $saleBooks
 */
class Employee extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id', 'firstname', 'lastname'], 'required'],
            [['job_id'], 'default', 'value' => null],
            [['job_id'], 'integer'],
            [['firstname', 'lastname', 'middlename'], 'string', 'max' => 63],
            [['job_id'], 'exist', 'skipOnError' => true, 'targetClass' => Job::class, 'targetAttribute' => ['job_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Должность',
            'firstname' => 'Имя',
            'lastname' => 'Фамилия',
            'middlename' => 'Отчество',
        ];
    }

    /**
     * Gets query for [[Job]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJob()
    {
        return $this->hasOne(Job::class, ['id' => 'job_id']);
    }

    /**
     * Gets query for [[ReturnBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReturnBooks()
    {
        return $this->hasMany(ReturnBook::class, ['employee_id' => 'id']);
    }

    /**
     * Gets query for [[SaleBooks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSaleBooks()
    {
        return $this->hasMany(SaleBook::class, ['employee_id' => 'id']);
    }
}
