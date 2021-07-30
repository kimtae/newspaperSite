<?php

use yii\db\Migration;

class m210730_070905_create_newspaper_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%newspaper}}', [
            'id' => $this->primaryKey(),
            'current_number' => $this->integer(11)->notNull(),
            'global_number' => $this->integer(11)->notNull(),
            'file' => $this->string(255)->notNull(),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%newspaper}}');
    }
}
