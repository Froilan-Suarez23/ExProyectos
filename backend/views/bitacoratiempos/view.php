<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoratiempos */

$this->title = $model->idBitacoraTiempo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bitacoratiempos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bitacoratiempos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idBitacoraTiempo' => $model->idBitacoraTiempo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idBitacoraTiempo' => $model->idBitacoraTiempo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idBitacoraTiempo',
            'FechaInicio',
            'HoraInicio',
            'FechaFinal',
            'HoraFinal',
            'Interrupcion',
            'Total',
            'idEtapa',
            'Descripcion',
            'idProyecto',
            'idHistoria',
            'Artefacto',
            'idUsuario',
        ],
    ]) ?>

</div>
