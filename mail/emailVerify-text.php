<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Здравствуйте, <?= $user->name ?>!

Перейдите по данной ссылке для подтверждения вашей электронной почты:

<?= $verifyLink ?>
