<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoradefectos */

$this->title = Yii::t('app', 'Update Bitacoradefectos: {name}', [
    'name' => $model->idBitacoraDefecto,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bitacoradefectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idBitacoraDefecto, 'url' => ['view', 'idBitacoraDefecto' => $model->idBitacoraDefecto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bitacoradefectos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
