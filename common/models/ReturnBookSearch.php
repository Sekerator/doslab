<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ReturnBook;

/**
 * ReturnBookSearch represents the model behind the search form of `common\models\ReturnBook`.
 */
class ReturnBookSearch extends ReturnBook
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'sale_id', 'employee_id', 'state_id', 'created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ReturnBook::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'sale_id' => $this->sale_id,
            'employee_id' => $this->employee_id,
            'state_id' => $this->state_id,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }
}
