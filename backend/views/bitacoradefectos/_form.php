<?php

use backend\models\Bitacoradefectos;
use backend\models\Defectos;
use backend\models\Etaparemovido;
use backend\models\Etapas;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use backend\models\Proyectos;

/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoradefectos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacoradefectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php 
        $defecto = ArrayHelper::map(Defectos::find()->where(['Activo' => 1])->orderBy('NombreDefecto')->all(), 'idDefecto', 'NombreDefecto');
        echo $form->field($model, 'idDefecto')->widget(Select2::classname(), [
            'data' => $defecto,
            'language' => 'es',
            'options' => ['placeholder' => 'seleccione un etapa...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php 
        $etapa = ArrayHelper::map(Etapas::find()->where(['Activo' => 1])->orderBy('NombreEtapa')->all(), 'idEtapa', 'NombreEtapa');
        echo $form->field($model, 'idEtapa')->widget(Select2::classname(), [
            'data' => $etapa,
            'language' => 'es',
            'options' => ['placeholder' => 'seleccione un etapa...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    



    
    <?php 
        $etapa2 = ArrayHelper::map(Etaparemovido::find()->where(['Activo' => 1])->orderBy('NombreEtapa')->all(), 'idEtaparr', 'NombreEtapa');
        echo $form->field($model, 'idEtaparr')->widget(Select2::classname(), [
            'data' => $etapa2,
            'language' => 'es',
            'options' => ['placeholder' => 'seleccione un etapa...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>



    <?=
    $form->field($model, 'FechaCaptura')->widget(yii\jui\DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
        'value' => date('Y/m/d'),
        'options' => ['style' => 'position: relative; z-index: 999', 'class' => 'form-control']
    ])
    ?>

    <?php 
        $proyectos = ArrayHelper::map(Proyectos::find()->where(['Activo' => 1])->orderBy('NombreProyecto')->all(), 'idProyecto', 'NombreProyecto');
        echo $form->field($model, 'idProyecto')->widget(Select2::classname(), [
            'data' => $proyectos,
            'language' => 'es',
            'options' => ['placeholder' => 'seleccione un proyecto...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'Hora')->textInput() ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>
    


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
