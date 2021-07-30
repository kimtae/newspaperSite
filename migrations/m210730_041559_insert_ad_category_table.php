<?php

use yii\db\Migration;

/**
 * Class m210730_041559_insert_ad_category_table
 */
class m210730_041559_insert_ad_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('ad_category', ['title'], [
            ['Продажа'],
            ['Работа'],
            ['Разное'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210730_041559_insert_ad_category_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210730_041559_insert_ad_category_table cannot be reverted.\n";

        return false;
    }
    */
}
