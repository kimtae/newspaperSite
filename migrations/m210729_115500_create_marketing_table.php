<?php

use yii\db\Migration;

class m210729_115500_create_marketing_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('marketing', [
            'id' => $this->primaryKey(),
            'title' => $this->string(50)->notNull(),
            'text' => $this->text()->notNull(),
            'logo' => $this->string(255)->notNull(),
            'author' => $this->string(255)->notNull(),
            'number' => $this->string(11),
            'email' => $this->string(32),
            'address' => $this->string(255),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%marketing}}');
    }
}
