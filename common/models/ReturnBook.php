<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "return_book".
 *
 * @property int $id
 * @property int $sale_id
 * @property int $employee_id
 * @property int $state_id
 * @property int|null $created_at
 *
 * @property Employee $employee
 * @property SaleBook $sale
 * @property StateBook $state
 */
class ReturnBook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'return_book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sale_id', 'employee_id', 'state_id'], 'required'],
            [['sale_id', 'employee_id', 'state_id', 'created_at'], 'default', 'value' => null],
            [['sale_id', 'employee_id', 'state_id', 'created_at'], 'integer'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::class, 'targetAttribute' => ['employee_id' => 'id']],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => SaleBook::class, 'targetAttribute' => ['sale_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => StateBook::class, 'targetAttribute' => ['state_id' => 'id']],
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
            'sale_id' => 'Выдача',
            'employee_id' => 'Сотрудник',
            'state_id' => 'Состояние',
            'created_at' => 'Дата возврата',
        ];
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
     * Gets query for [[Sale]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(SaleBook::class, ['id' => 'sale_id']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(StateBook::class, ['id' => 'state_id']);
    }
}
