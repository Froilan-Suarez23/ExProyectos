<?php

use backend\models\Etapas;
use backend\models\Historias;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Proyectos;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use yii\jui\DatePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoratiempos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bitacoratiempos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'FechaInicio')->widget(yii\jui\DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
        'value' => date('d/m/Y'),
        'options' => ['style' => 'position: relative; z-index: 999', 'class' => 'form-control']
    ])
    ?>

    <?=
    $form->field($model, 'HoraInicio')->widget(TimePicker::className(), [
       
        'pluginOptions' => ['minuteStep' => 1]
    ])
    ?>

    <?=
    $form->field($model, 'FechaFinal')->widget(yii\jui\DatePicker::className(), [
        'dateFormat' => 'yyyy-MM-dd',
        'value' => date('d/m/Y'),
        'options' => ['style' => 'position: relative; z-index: 999', 'class' => 'form-control']
    ])
    ?>

    <?=
    $form->field($model, 'HoraFinal')->widget(kartik\time\TimePicker::className(), [
       
        'pluginOptions' => ['minuteStep' => 1]
    ])
    ?>

    <?= $form->field($model, 'Interrupcion')->textInput() ?>

    

    
    <?= $form->field($model, 'idEtapa')->dropDownList(ArrayHelper::map(Etapas::find()->all(),'idEtapa','NombreEtapa'),

    ['prompt'=>'Seleccionar su etapa... ']) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

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

    <?php 
        $historia = ArrayHelper::map(Historias::find()->where(['Activo' => 1])->orderBy('NombreHistoria')->all(), 'idHistoria', 'NombreHistoria');
        echo $form->field($model, 'idHistoria')->widget(Select2::classname(), [
            'data' => $historia,
            'language' => 'es',
            'options' => ['placeholder' => 'seleccione un historia...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

      

    <?= $form->field($model, 'Artefacto')->textInput(['maxlength' => true]) ?>

   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
