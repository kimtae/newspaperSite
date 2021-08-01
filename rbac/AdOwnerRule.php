<?php

namespace app\rbac;

use yii\rbac\Rule;

/**
 * Проверяем author_id на соответствие с пользователем, переданным через параметры
 */
class AdOwnerRule extends Rule
{
    public $name = 'isAdOwner';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['ad']) ? $params['ad']->author_id == Yii::$app->user->id : false;
    }
}