<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Defectos */

$this->title = Yii::t('app', 'Update Defectos: {name}', [
    'name' => $model->idDefecto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Defectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idDefecto, 'url' => ['view', 'idDefecto' => $model->idDefecto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="defectos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
