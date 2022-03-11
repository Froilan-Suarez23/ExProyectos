<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Bitacoratiempos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BitacoratiemposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bitacoratiempos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacoratiempos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bitacoratiempos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idBitacoraTiempo',
            'FechaInicio',
            'HoraInicio',
            'FechaFinal',
            'HoraFinal',
            'Interrupcion',
            'Total',
            'idEtapa',
            'Descripcion',
            //'idProyecto',
            //'idHistoria',
            //'Artefacto',
            //'idUsuario',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bitacoratiempos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idBitacoraTiempo' => $model->idBitacoraTiempo]);
                 }
            ],
        ],
    ]); ?>


</div>
