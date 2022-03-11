<?php
use backend\models\Historias;
use backend\models\Proyectos;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model backend\models\Historias */
/* @var $form yii\widgets\ActiveForm */
/*

<?= $form->field($model, 'idSprints')->textInput() ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

*/
$hist = new Historias();

?>

<div class="historias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreHistoria')->textInput(['maxlength' => true]) ?>

    <?php  $num = $hist::getSiguienteFolio(); ?>
    <?= $form->field($model, 'Numero')->textInput(['maxlength' => true, 'value' => $num]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'Peso')->textInput() ?>

   
    <?= $form->field($model, 'idProyecto')->dropDownList(ArrayHelper::map(Proyectos::find()->all(),'idProyecto','NombreProyecto'),

    ['prompt'=>'Seleccionar... ']) ?>
   

   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
