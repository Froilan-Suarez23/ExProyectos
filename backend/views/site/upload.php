<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use dosamigos\fileinput\FileInput;
 
$this->title = Yii::t('app', 'Cargar Archivos');
$this->params['breadcrumbs'][] = $this->title;
?>


<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
<p>Indique el archivo en excel de sus tiempos a cargar:</p>

<?=
    $form->field($model, 'excelFile')->fileInput()
?>

<br>
<?= Html::submitButton(Yii::t('app', 'Cargar'), ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end()?>


<!-- 
/* /*$form->field($model, 'excelFile')->fileInput()?>*/
FileInput::widget([
    'model' => $model,
    'attribute' => 'excelFile', 
]);


-->