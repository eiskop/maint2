<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\TaskFile */

$this->title = Yii::t('app', 'Create Task File');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Task Files'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-file-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
