<?php

use yii\db\Migration;

class m210730_031458_create_ad_category_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('ad_category', [
            'id' => $this->primaryKey(),
            'title' => $this->string(32)->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%ad_category}}');
    }
}
