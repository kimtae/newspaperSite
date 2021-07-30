<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Advertisements */

$this->title = 'Create Advertisements';
$this->params['breadcrumbs'][] = ['label' => 'Advertisements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advertisements-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
