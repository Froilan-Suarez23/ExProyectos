<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Proyectos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProyectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Proyectos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Proyectos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idProyecto',
            'NombreProyecto',
            'Activo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Proyectos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idProyecto' => $model->idProyecto]);
                 }
            ],
        ],
    ]); ?>


</div>
