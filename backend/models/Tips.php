<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "con_tips".
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 * @property string $content
 * @property integer $ctime
 * @property integer $articleId
 * @property integer $if_read
 */
class Tips extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'con_tips';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_id', 'to_id', 'ctime', 'articleId', 'if_read'], 'integer'],
            [['content'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_id' => 'From ID',
            'to_id' => 'To ID',
            'content' => 'Content',
            'ctime' => 'Ctime',
            'articleId' => 'Article ID',
            'if_read' => 'If Read',
        ];
    }
}
