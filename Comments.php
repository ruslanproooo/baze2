<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $IDcomment
 * @property string $massage
 * @property int $masterID
 * @property int $requestID
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['massage', 'masterID', 'requestID'], 'required'],
            [['masterID', 'requestID'], 'integer'],
            [['massage'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDcomment' => 'I Dcomment',
            'massage' => 'Massage',
            'masterID' => 'Master ID',
            'requestID' => 'Request ID',
        ];
    }
}
