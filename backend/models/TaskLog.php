<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task_log".
 *
 * @property integer $id
 * @property integer $task_id
 * @property string $description
 * @property integer $completion
 * @property string $created
 * @property integer $created_by
 * @property string $changed
 * @property integer $changed_by
 *
 * @property User $changedBy
 * @property Task $task
 * @property User $createdBy
 */
class TaskLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'description', 'completion', 'created', 'created_by', 'changed_by'], 'required'],
            [['task_id', 'completion', 'created_by', 'changed_by'], 'integer'],
            [['description'], 'string'],
            [['created', 'changed'], 'safe'],
            [['changed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['changed_by' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(), 'targetAttribute' => ['task_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'task_id' => Yii::t('app', 'Task ID'),
            'description' => Yii::t('app', 'Description'),
            'completion' => Yii::t('app', 'Completion'),
            'created' => Yii::t('app', 'Created'),
            'created_by' => Yii::t('app', 'Created By'),
            'changed' => Yii::t('app', 'Changed'),
            'changed_by' => Yii::t('app', 'Changed By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChangedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'changed_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }
}
