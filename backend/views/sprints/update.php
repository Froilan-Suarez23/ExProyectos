<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Sprints */

$this->title = Yii::t('app', 'Update Sprints: {name}', [
    'name' => $model->idSprints,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sprints'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSprints, 'url' => ['view', 'idSprints' => $model->idSprints]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sprints-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
