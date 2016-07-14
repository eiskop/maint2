<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Task;

/**
 * TaskSearch represents the model behind the search form about `backend\models\Task`.
 */
class TaskSearch extends Task
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'responsible', 'priority', 'completion', 'today', 'created_by', 'changed_by'], 'integer'],
            [['name', 'description', 'start_date', 'due_date', 'location', 'machine', 'created', 'changed'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Task::find();

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
            'start_date' => $this->start_date,
            'due_date' => $this->due_date,
            'responsible' => $this->responsible,
            'priority' => $this->priority,
            'completion' => $this->completion,
            'today' => $this->today,
            'created' => $this->created,
            'created_by' => $this->created_by,
            'changed' => $this->changed,
            'changed_by' => $this->changed_by,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'machine', $this->machine]);

        return $dataProvider;
    }
}
