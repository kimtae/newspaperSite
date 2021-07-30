<?php

use yii\db\Migration;

class m210730_041559_insert_ad_category_table extends Migration
{
    public function Up()
    {
        $this->batchInsert('ad_category', ['title'], [
            ['Продажа'],
            ['Работа'],
            ['Разное'],
        ]);
    }

    public function Down()
    {
        echo "m210730_041559_insert_ad_category_table cannot be reverted.\n";

        return false;
    }
}
