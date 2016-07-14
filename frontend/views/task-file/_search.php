<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TaskFileSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-file-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'task_id') ?>

    <?= $form->field($model, 'file_no') ?>

    <?= $form->field($model, 'basename') ?>

    <?= $form->field($model, 'file_name') ?>

    <?php // echo $form->field($model, 'extension') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'created') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'changed') ?>

    <?php // echo $form->field($model, 'changed_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
