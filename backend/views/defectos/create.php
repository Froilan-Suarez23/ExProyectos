<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Defectos */

$this->title = Yii::t('app', 'Create Defectos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Defectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="defectos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
