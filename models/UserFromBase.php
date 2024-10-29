<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $username
 * @property string $password
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property int $allowance
 * @property int $allowance_updated_at
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class UserFromBase extends \yii\db\ActiveRecord
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
            [['last_name', 'first_name', 'username', 'password'], 'required'],
            [['allowance', 'allowance_updated_at'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['last_name', 'first_name'], 'string', 'max' => 64],
            [['username'], 'string', 'max' => 15],
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
            'id' => 'ID',
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



    public static function findIdentity($id)
    {
        return UserFromBase::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

        
        return UserFromBase::findOne(['access_token' => $token]);
    
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {       
        
        return UserFromBase::findOne(['username'=>$username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

}
