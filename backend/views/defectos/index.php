<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use backend\models\Defectos;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DefectosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Defectos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="defectos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Defectos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idDefecto',
            'NombreDefecto',
            'Activo',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Defectos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idDefecto' => $model->idDefecto]);
                 },
                 'template' => '{view}{update} {delete}',
            ],
        ],
    ]); ?>


</div>
