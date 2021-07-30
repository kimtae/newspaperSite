<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        //если понадобятся правила, то вот пример их инициализации
        //$example_rule = new \app\rbac\ExampleEmptyRule;
        //$auth->add($example_rule);

        //$example_permission = $auth->createPermission('example_permission');
        //$example_permission->ruleName = $example_rule->name;
        //$auth->add($example_permission);

        $create_ad = $auth->createPermission('create_ad');
        $create_ad->description = 'Создание объявления';
        $auth->add($create_ad);

        // хз понадобится ли функционал редактироания объявлений для юзеверей
        // $update_ad = $auth->createPermission('update_ad');
        // $update_ad->description = 'Update ad';
        // $auth->add($update_ad);

        $manage_category = $auth->createPermission('manage_category');
        $manage_category->description = 'Управление категориями';
        $auth->add($manage_category);

        $manage_ad = $auth->createPermission('manage_ad');
        $manage_ad->description = 'Управление объявлениями';
        $auth->add($manage_ad);

        // обычный юзер
        $default_user = $auth->createRole('default_user');
        $auth->add($default_user);
        $auth->addChild($default_user, $create_ad);

        // админ
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $manage_category);
        $auth->addChild($admin, $manage_ad);
        //$auth->addChild($admin, $author);

        $auth->assign($admin, 1);
    }
}