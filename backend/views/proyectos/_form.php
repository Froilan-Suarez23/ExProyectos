<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Proyectos */
/* @var $form yii\widgets\ActiveForm */
/* <?= $form->field($model, 'Activo')->textInput() ?>*/
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NombreProyecto')->textInput(['maxlength' => true]) ?>

    <?php
        if(!$model->isNewRecord) {
            echo $form->field($model, 'Activo')->checkbox();
    ?>

<h2>Actividades</h2>
        <?=
        \yii\grid\GridView::widget([
            'dataProvider' => new \yii\data\ActiveDataProvider([
                'query' => $model->getActividades(),
                'pagination' => false
            ]),

            'columns' => [
                'NombreActividad',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'controller' => 'actividades',
                    'header' => Html::a('<i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar nuevo', ['actividades/create-con-proyecto', 'idProyecto' => $model->idProyecto]),
                    'template' => '{update_con_proyecto} {delete}',
                    'buttons' => [
                        'update_con_proyecto' => function ($url, $model) {
                            return Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"/></svg>', $url);
                        }
                    ],
                    'urlCreator' => function ($action, $model, $key, $index){
                        if($action === 'update_con_proyecto'){
                            $url = Url::to(['actividades/update-con-proyecto', 'idProyecto' => $model->idActividad]);
                            return $url;
                        }
                        elseif ($action == 'delete'){
                            $url =Url::to(['actividades/delete-con-proyecto', 'idActividad' => $model->idActividad]);
                            return $url;
                        }
                    }
                    
                ],
            ]
        ]);
        ?>
    <?php } ?>
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
