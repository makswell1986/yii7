<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Base;

/**
 * BaseSearch represents the model behind the search form of `app\models\Base`.
 */
class BaseSearch extends Base
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_num', 'id'], 'integer'],
            [['type', 'flag', 'payload', 'action', 'request_datetime'], 'safe'],
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
        $query = Base::find();

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
            'id_num' => $this->id_num,
            'id' => $this->id,
            'request_datetime' => $this->request_datetime,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'flag', $this->flag])
            ->andFilterWhere(['like', 'payload', $this->payload])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
