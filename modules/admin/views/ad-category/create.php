<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AdCategory */

$this->title = 'Создать категорию';
$this->params['breadcrumbs'][] = ['label' => 'Категории объявлений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
