<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Sprints;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\SprintsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sprints');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sprints-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Sprints'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'NombreSprints',
            
            'FechaInicio',
            'FechaFinal',
            //'CantidadDias',
            //'Activo',
            //'idProyecto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Sprints $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idSprints' => $model->idSprints]);
                 }
            ],
        ],
    ]); ?>


</div>
