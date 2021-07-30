<?php

use yii\db\Migration;

class m210729_113835_create_news_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'text' => $this->text()->notNull(),
            'borrowing' => $this->boolean()->notNull(),
            'author' => $this->string(255)->notNull(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
