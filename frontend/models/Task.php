<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $start_date
 * @property string $due_date
 * @property integer $responsible
 * @property string $location
 * @property string $machine
 * @property string $priority
 * @property integer $completion
 * @property integer $today
 * @property string $created
 * @property integer $created_by
 * @property string $changed
 * @property integer $changed_by
 *
 * @property User $responsible0
 * @property User $createdBy
 * @property User $changedBy
 * @property TaskFile[] $taskFiles
 * @property TaskLog[] $taskLogs
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'start_date', 'due_date', 'responsible', 'location', 'machine', 'priority', 'today', 'created', 'created_by', 'changed_by'], 'required'],
            [['description', 'priority'], 'string'],
            [['start_date', 'due_date', 'created', 'changed'], 'safe'],
            [['responsible', 'completion', 'today', 'created_by', 'changed_by'], 'integer'],
            [['name', 'location', 'machine'], 'string', 'max' => 255],
            [['responsible'], 'unique'],
            [['responsible'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['responsible' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['changed_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['changed_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'start_date' => Yii::t('app', 'Start Date'),
            'due_date' => Yii::t('app', 'Due Date'),
            'responsible' => Yii::t('app', 'Responsible'),
            'location' => Yii::t('app', 'Location'),
            'machine' => Yii::t('app', 'Machine'),
            'priority' => Yii::t('app', 'Priority'),
            'completion' => Yii::t('app', 'Completion'),
            'today' => Yii::t('app', 'Today'),
            'created' => Yii::t('app', 'Created'),
            'created_by' => Yii::t('app', 'Created By'),
            'changed' => Yii::t('app', 'Changed'),
            'changed_by' => Yii::t('app', 'Changed By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsible0()
    {
        return $this->hasOne(User::className(), ['id' => 'responsible']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
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
    public function getTaskFiles()
    {
        return $this->hasMany(TaskFile::className(), ['task_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTaskLogs()
    {
        return $this->hasMany(TaskLog::className(), ['task_id' => 'id']);
    }
}
