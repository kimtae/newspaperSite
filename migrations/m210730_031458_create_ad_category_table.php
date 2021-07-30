<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ad_category}}`.
 */
class m210730_031458_create_ad_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ad_category}}');
    }
}
