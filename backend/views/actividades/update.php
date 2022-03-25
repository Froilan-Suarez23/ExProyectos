<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Actividades */

$this->title = Yii::t('app', 'Update Actividades: {name}', [
    'name' => $model->idActividad,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Actividades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idActividad, 'url' => ['view', 'idActividad' => $model->idActividad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="actividades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'bandera' => $bandera,
    ]) ?>

</div>
