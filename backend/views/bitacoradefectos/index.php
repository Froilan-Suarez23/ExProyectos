<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Bitacoradefectos;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\BitacoradefectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bitacoradefectos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacoradefectos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bitacoradefectos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idBitacoraDefecto',
            
            'FechaCaptura',
            'idProyecto',
            'Hora',
            'Descripcion',
           // 'idEtapa',
            //'idProyecto',
            //'idDefecto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bitacoradefectos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idBitacoraDefecto' => $model->idBitacoraDefecto]);
                 },
                 'template' => '{view}{update} {delete}',
            ],
        ],
    ]); ?>


</div>
