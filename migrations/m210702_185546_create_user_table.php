<?php

use yii\db\Migration;

class m210702_185546_create_user_table extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
 
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
 
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull(),
            'surname' => $this->string(32)->notNull(),
            'patronymic' => $this->string(32)->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'verification_token' => $this->string()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'status' => $this->smallinteger(6)->defaultValue(9)->notNull(),
        ], $tableOptions);
    }
    
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
