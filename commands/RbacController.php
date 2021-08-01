<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Правило проверки принадлежности объявления юзеру
        $adOwnerRule = new \app\rbac\AdOwnerRule;
        $auth->add($adOwnerRule);

        // Разрешение на управление категориями - Read Update Delete
        $categoryManage = $auth->createPermission('categoryManage');
        $categoryManage->description = 'Управление категориями';
        $auth->add($categoryManage);

        // Разрешение на создание объявления
        $adCreate = $auth->createPermission('adCreate');
        $adCreate->description = 'Создание объявления';
        $auth->add($adCreate);

        // Разрешение на управление всеми объявлениями - Read Update Delete
        $adManage = $auth->createPermission('adManage');
        $adManage->description = 'Управление объявлениями';
        $auth->add($adManage);

        // Разрешение на управление собственными объявлениями - Read Update Delete
        $adOwnManage = $auth->createPermission('adOwnManage');
        $adOwnManage->ruleName = $adOwnerRule->name;
        $auth->add($adOwnManage);

        // Производим наследование. Теперь manageOwnBook можно вызывать через manageBook
        $auth->addChild($adOwnManage, $adManage);

        // Роль обычного юзера
        $default_user = $auth->createRole('default_user');
        $auth->add($default_user);
        $auth->addChild($default_user, $adCreate);
        $auth->addChild($default_user, $adOwnManage);

        // Роль админа
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $categoryManage);
        $auth->addChild($admin, $adManage);
        //$auth->addChild($admin, $default_user); //тут пока хз нужно ли ему иметь разрешения обычного юзера. Например создание объявлений.

        $auth->assign($admin, 1); // задаешь роль админа юзеру с айди 1
        //$auth->assign($default_user, 2); //задаешь дефолтную роль юзеру с айди 2
    }
}