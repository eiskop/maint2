<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TaskFile;

/**
 * TaskFileSearch represents the model behind the search form about `backend\models\TaskFile`.
 */
class TaskFileSearch extends TaskFile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'task_id', 'file_no', 'size', 'created_by', 'changed_by'], 'integer'],
            [['basename', 'file_name', 'extension', 'type', 'description', 'created', 'changed'], 'safe'],
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
        $query = TaskFile::find();

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
            'file_no' => $this->file_no,
            'size' => $this->size,
            'created' => $this->created,
            'created_by' => $this->created_by,
            'changed' => $this->changed,
            'changed_by' => $this->changed_by,
        ]);

        $query->andFilterWhere(['like', 'basename', $this->basename])
            ->andFilterWhere(['like', 'file_name', $this->file_name])
            ->andFilterWhere(['like', 'extension', $this->extension])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
