<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Defectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="defectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreDefecto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Activo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
