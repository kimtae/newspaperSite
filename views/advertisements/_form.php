<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Advertisements */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advertisements-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'author_id')->textInput() ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'confirmed')->textInput() ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
