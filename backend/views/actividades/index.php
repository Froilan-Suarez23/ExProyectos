<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Actividades;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ActividadesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Actividades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="actividades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Actividades'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idActividad',
            'NombreActividad',
            'Descripcion',
            'Activo',
            'idProyecto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Actividades $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idActividad' => $model->idActividad]);
                 },
                 'template' => '{view}{update} {delete}',
            ],
        ],
    ]); ?>


</div>
