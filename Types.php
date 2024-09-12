<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "types".
 *
 * @property int $IDtype
 * @property string $type
 *
 * @property User $iDtype
 */
class Types extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'string'],
            [['IDtype'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['IDtype' => 'typeID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IDtype' => 'I Dtype',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[IDtype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIDtype()
    {
        return $this->hasOne(User::class, ['typeID' => 'IDtype']);
    }
}
