<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requestStatuses".
 *
 * @property int $IDrequestStatus
 * @property string $requestStatus
 *
 * @property Requests $iDrequestStatus
 */
class RequestStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requestStatuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['requestStatus'], 'required'],
            [['requestStatus'], 'string'],
            [['IDrequestStatus'], 'exist', 'skipOnError' => true, 'targetClass' => Requests::class, 'targetAttribute' => ['IDrequestStatus' => 'requestStatusID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDrequestStatus' => 'I Drequest Status',
            'requestStatus' => 'Request Status',
        ];
    }

    /**
     * Gets query for [[IDrequestStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDrequestStatus()
    {
        return $this->hasOne(Requests::class, ['requestStatusID' => 'IDrequestStatus']);
    }
}
