<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\SprintsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprints-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSprints') ?>

    <?= $form->field($model, 'NombreSprints') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'FechaInicio') ?>

    <?= $form->field($model, 'FechaFinal') ?>

    <?php // echo $form->field($model, 'CantidadDias') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'idProyecto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
