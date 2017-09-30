<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "con_article".
 *
 * @property integer $id
 * @property integer $userId
 * @property string $title
 * @property string $content
 * @property integer $ctime
 * @property integer $themeId
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'con_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'ctime', 'themeId'], 'integer'],
            [['title', 'content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'title' => 'Title',
            'content' => 'Content',
            'ctime' => 'Ctime',
            'themeId' => 'Theme ID',
        ];
    }
}
