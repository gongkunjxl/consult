<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "con_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $nickname
 * @property integer $user_type
 * @property string $weixin
 * @property double $onPrice
 * @property double $offPrice
 * @property double $score
 * @property string $desp
 * @property integer $ctime
 * @property integer $if_check
 * @property integer $prt
 */
class Doctor extends \yii\db\ActiveRecord
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
            [['user_type', 'ctime', 'if_check', 'prt'], 'integer'],
            [['onPrice', 'offPrice', 'score'], 'number'],
            [['desp'], 'string'],
            [['username', 'nickname'], 'string', 'max' => 45],
            [['password', 'weixin'], 'string', 'max' => 64],
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
            'nickname' => 'Nickname',
            'user_type' => 'User Type',
            'weixin' => 'Weixin',
            'onPrice' => 'On Price',
            'offPrice' => 'Off Price',
            'score' => 'Score',
            'desp' => 'Desp',
            'ctime' => 'Ctime',
            'if_check' => 'If Check',
            'prt' => 'Prt',
        ];
    }
}
