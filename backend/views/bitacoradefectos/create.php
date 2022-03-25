<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Bitacoradefectos */

$this->title = Yii::t('app', 'Create Bitacoradefectos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bitacoradefectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bitacoradefectos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
