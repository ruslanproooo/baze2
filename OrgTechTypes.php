<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orgTechTypes".
 *
 * @property int $IDorgTechTypes
 * @property string $orgTechType
 *
 * @property Requests $iDorgTechTypes
 */
class OrgTechTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orgTechTypes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orgTechType'], 'required'],
            [['orgTechType'], 'string'],
            [['IDorgTechTypes'], 'exist', 'skipOnError' => true, 'targetClass' => Requests::class, 'targetAttribute' => ['IDorgTechTypes' => 'orgTechTypeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDorgTechTypes' => 'I Dorg Tech Types',
            'orgTechType' => 'Org Tech Type',
        ];
    }

    /**
     * Gets query for [[IDorgTechTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDorgTechTypes()
    {
        return $this->hasOne(Requests::class, ['orgTechTypeID' => 'IDorgTechTypes']);
    }
}
