<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\HistoriasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="historias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idHistoria') ?>

    <?= $form->field($model, 'NombreHistoria') ?>

    <?= $form->field($model, 'Numero') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Peso') ?>

    <?php // echo $form->field($model, 'idSprints') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'idProyecto') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
