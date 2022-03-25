<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ActividadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idActividad') ?>

    <?= $form->field($model, 'NombreActividad') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Activo') ?>

    <?= $form->field($model, 'idProyecto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>