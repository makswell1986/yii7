<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $last_name
 * @property string|null $first_name
 * @property string|null $username
 * @property string|null $password
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property string|null $allowance
 * @property string|null $allowance_updated_at
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class UserAllowance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['last_name', 'first_name'], 'string', 'max' => 64],
            [['username', 'allowance', 'allowance_updated_at'], 'string', 'max' => 15],
            [['password', 'auth_key', 'access_token'], 'string', 'max' => 32],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'username' => 'Username',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
            'allowance' => 'Allowance',
            'allowance_updated_at' => 'Allowance Updated At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
