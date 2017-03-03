<?php

namespace mgcode\location\models;

use mgcode\helpers\ActiveRecordHelperTrait;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "location".
 * @property GooglePlace $google
 */
class Location extends AbstractLocation
{
    use ActiveRecordHelperTrait;

    /** @inheritdoc */
    public function scenarios()
    {
        return [
            static::SCENARIO_DEFAULT => ['country', 'region', 'city', 'address', 'zip_code', 'lat', 'lng'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoogle()
    {
        return $this->hasOne(GooglePlace::className(), ['id' => 'google_id']);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className() => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }
}
