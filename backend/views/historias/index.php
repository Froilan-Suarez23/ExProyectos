<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Historias;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\HistoriasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Historias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Historias'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idHistoria',
            'NombreHistoria',
            'Numero',
            'idProyecto',
            //'Descripcion',
            'Peso',
            //'idSprints',
            //'idUsuario',
            'Activo',
            //'idProyecto',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Historias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idHistoria' => $model->idHistoria]);
                 }
            ],
        ],
    ]); ?>


</div>
