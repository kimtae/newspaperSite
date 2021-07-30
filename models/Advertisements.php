<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "advertisements".
 *
 * @property int $id
 * @property string $text
 * @property string $phone
 * @property string $created_at
 * @property int $author_id
 * @property int $category_id
 * @property int $confirmed
 * @property int $paid
 *
 * @property User $author
 * @property AdCategory $category
 */
class Advertisements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advertisements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'phone', 'created_at', 'author_id', 'category_id'], 'required'],
            [['text'], 'string'],
            [['created_at'], 'safe'],
            [['author_id', 'category_id', 'confirmed', 'paid'], 'integer'],
            [['phone'], 'string', 'max' => 11],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => AdCategory::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'phone' => 'Phone',
            'created_at' => 'Created At',
            'author_id' => 'Author ID',
            'category_id' => 'Category ID',
            'confirmed' => 'Confirmed',
            'paid' => 'Paid',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(AdCategory::className(), ['id' => 'category_id']);
    }
}
