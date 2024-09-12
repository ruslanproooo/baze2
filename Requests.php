<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $IDrequest
 * @property string $startDate
 * @property int $orgTechTypeID
 * @property string $orgTechModel
 * @property string $problemDescription
 * @property int $requestStatusID
 * @property string $completionDate
 * @property string $repairPart
 * @property string $masterID
 * @property int $clientID
 *
 * @property OrgTechTypes $orgTechTypes
 * @property RequestStatuses $requestStatuses
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['startDate', 'orgTechTypeID', 'orgTechModel', 'problemDescription', 'requestStatusID', 'completionDate', 'repairPart', 'masterID', 'clientID'], 'required'],
            [['startDate', 'completionDate'], 'safe'],
            [['orgTechTypeID', 'requestStatusID', 'clientID'], 'integer'],
            [['problemDescription'], 'string'],
            [['orgTechModel', 'repairPart', 'masterID'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDrequest' => 'I Drequest',
            'startDate' => 'Start Date',
            'orgTechTypeID' => 'Org Tech Type ID',
            'orgTechModel' => 'Org Tech Model',
            'problemDescription' => 'Problem Description',
            'requestStatusID' => 'Request Status ID',
            'completionDate' => 'Completion Date',
            'repairPart' => 'Repair Part',
            'masterID' => 'Master ID',
            'clientID' => 'Client ID',
        ];
    }

    /**
     * Gets query for [[OrgTechTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgTechTypes()
    {
        return $this->hasOne(OrgTechTypes::class, ['IDorgTechTypes' => 'orgTechTypeID']);
    }

    /**
     * Gets query for [[RequestStatuses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestStatuses()
    {
        return $this->hasOne(RequestStatuses::class, ['IDrequestStatus' => 'requestStatusID']);
    }
}
