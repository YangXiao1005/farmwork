<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property integer $admin_id
 * @property string $admin_name
 * @property string $admin_pwd
 */
class Admins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_name', 'admin_pwd'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => '管理员id',
            'admin_name' => '用户名称',
            'admin_pwd' => '用户密码',
        ];
    }
}
