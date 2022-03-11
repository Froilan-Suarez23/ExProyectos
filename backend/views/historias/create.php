<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Historias */

$this->title = Yii::t('app', 'Create Historias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Historias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
