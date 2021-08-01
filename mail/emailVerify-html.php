<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
<div class="verify-email", style="font-size:12pt;">
    <p>Здравствуйте, <?= Html::encode($user->name) ?>!</p>
    <p>Для подтверждения своей электронной почты на сайте газеты "Первомайские ВЕДОМОСТИ" нажмите <?= Html::a(Html::encode('сюда'), $verifyLink) ?>.</p>
</div>
