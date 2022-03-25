<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\BitacoradefectosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacoradefectos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idBitacoraDefecto') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'FechaCaptura') ?>

    <?= $form->field($model, 'Hora') ?>

    <?= $form->field($model, 'idEtapa') ?>

    <?php // echo $form->field($model, 'idProyecto') ?>

    <?php // echo $form->field($model, 'idDefecto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
