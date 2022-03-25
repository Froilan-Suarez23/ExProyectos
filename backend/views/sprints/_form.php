<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Sprints */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sprints-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreSprints')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'FechaInicio')->widget(yii\jui\DatePicker::className(), [
        'dateFormat' => 'dd-MM-yyyy',
        'value' => date('d/m/Y'),
        'options' => ['style' => 'position: relative; z-index: 999', 'class' => 'form-control']
    ])
    ?>

    <?=
    $form->field($model, 'FechaFinal')->widget(yii\jui\DatePicker::className(), [
        'dateFormat' => 'dd-MM-yyyy',
        'value' => date('d/m/Y'),
        'options' => ['style' => 'position: relative; z-index: 999', 'class' => 'form-control']
    ])
    ?>

    <?= $form->field($model, 'CantidadDias')->textInput() ?>

    <?= $form->field($model, 'Activo')->textInput() ?>

    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
