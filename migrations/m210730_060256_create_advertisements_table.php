<?php

use yii\db\Migration;

class m210730_060256_create_advertisements_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%advertisements}}', [
            'id' => $this->primaryKey(),
            'text' => $this->text()->notNull(),
            'phone' => $this->string(11)->notNull(),
            'created_at' => $this->datetime()->notNull(),
            'author_id' => $this->integer(11)->notNull(),
            'category_id' => $this->integer(6)->notNull(),
            'confirmed' => $this->boolean()->defaultValue(0)->notNull(),
            'paid' => $this->boolean()->defaultValue(0)->notNull(),
        ]);

        $this->createIndex(
            'idx-ad-author_id',
            'advertisements',
            'author_id'
        );

        $this->addForeignKey(
            'fk-ad-author_id',
            'advertisements',
            'author_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-ad-category_id',
            'advertisements',
            'category_id'
        );

        $this->addForeignKey(
            'fk-ad-category_id',
            'advertisements',
            'category_id',
            'ad_category',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-ad-author_id',
            'advertisements'
        );

        $this->dropIndex(
            'idx-ad-author_id',
            'advertisements'
        );

        $this->dropForeignKey(
            'fk-ad-category_id',
            'advertisements'
        );

        $this->dropIndex(
            'idx-ad-category_id',
            'advertisements'
        );

        $this->dropTable('{{%advertisements}}');
    }
}
