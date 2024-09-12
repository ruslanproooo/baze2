<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $IDuser
 * @property string $fio
 * @property string $phone
 * @property string $login
 * @property string $password
 * @property int $typeID
 *
 * @property Types $types
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            [['fio', 'phone', 'login', 'password', 'typeID'], 'required'],
            [['fio'], 'string'],
            [['typeID'], 'integer'],
            [['phone', 'login', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDuser' => 'I Duser',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'login' => 'Login',
            'password' => 'Password',
            'typeID' => 'Type ID',
        ];
    }

    /**
     * Gets query for [[Types]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTypes()
    {
        return $this->hasOne(Types::class, ['IDtype' => 'typeID']);
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return User::findOne(['username' => $username]);;
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
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return false;
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
