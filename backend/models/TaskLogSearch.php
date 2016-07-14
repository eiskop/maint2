<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TaskLog;

/**
 * TaskLogSearch represents the model behind the search form about `backend\models\TaskLog`.
 */
class TaskLogSearch extends TaskLog
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'task_id', 'completion', 'created_by', 'changed_by'], 'integer'],
            [['description', 'created', 'changed'], 'safe'],
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
        $query = TaskLog::find();

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
            'task_id' => $this->task_id,
            'completion' => $this->completion,
            'created' => $this->created,
            'created_by' => $this->created_by,
            'changed' => $this->changed,
            'changed_by' => $this->changed_by,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
