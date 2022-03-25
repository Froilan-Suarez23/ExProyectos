<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoradefectos */

$this->title = $model->idBitacoraDefecto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bitacoradefectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bitacoradefectos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idBitacoraDefecto' => $model->idBitacoraDefecto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idBitacoraDefecto' => $model->idBitacoraDefecto], [
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
            'idBitacoraDefecto',
            'Descripcion',
            'FechaCaptura',
            'Hora',
            'idEtapa',
            'idProyecto',
            'idDefecto',
        ],
    ]) ?>

</div>
