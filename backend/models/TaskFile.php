<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "task_file".
 *
 * @property integer $id
 * @property integer $task_id
 * @property integer $file_no
 * @property string $basename
 * @property string $file_name
 * @property string $extension
 * @property integer $size
 * @property string $type
 * @property string $description
 * @property string $created
 * @property integer $created_by
 * @property string $changed
 * @property integer $changed_by
 *
 * @property User $changedBy
 * @property Task $task
 * @property User $createdBy
 */
class TaskFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'task_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['task_id', 'file_no', 'basename', 'file_name', 'extension', 'size', 'type', 'description', 'created', 'created_by', 'changed_by'], 'required'],
            [['task_id', 'file_no', 'size', 'created_by', 'changed_by'], 'integer'],
            [['description'], 'string'],
            [['created', 'changed'], 'safe'],
            [['basename', 'file_name', 'type'], 'string', 'max' => 255],
            [['extension'], 'string', 'max' => 20],
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
            'file_no' => Yii::t('app', 'File No'),
            'basename' => Yii::t('app', 'Basename'),
            'file_name' => Yii::t('app', 'File Name'),
            'extension' => Yii::t('app', 'Extension'),
            'size' => Yii::t('app', 'Size'),
            'type' => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
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
