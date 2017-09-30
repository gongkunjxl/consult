<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "con_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $user_type
 * @property string $nickname
 * @property integer $ctime
 * @property integer $if_check
 */
class ConUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'con_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_type', 'ctime', 'if_check'], 'integer'],
            [['username', 'nickname'], 'string', 'max' => 45],
            [['password'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'user_type' => 'User Type',
            'nickname' => 'Nickname',
            'ctime' => 'Ctime',
            'if_check' => 'If Check',
        ];
    }
}
