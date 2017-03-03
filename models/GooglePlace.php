<?php

namespace mgcode\location\models;

use mgcode\helpers\ActiveRecordHelperTrait;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\Json;

/**
 * This is the model class for table "google_place".
 * @property Location[] $locations
 */
class GooglePlace extends AbstractGooglePlace
{
    use ActiveRecordHelperTrait;

    /** @inheritdoc */
    public function scenarios()
    {
        return [
            static::SCENARIO_DEFAULT => ['id', 'name', 'full_name', 'type', 'url', 'location_lat', 'location_lng', 'viewport_ne_lat', 'viewport_ne_lng', 'viewport_sw_lat', 'viewport_sw_lng', 'raw_data'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['google_id' => 'id']);
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className() => [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
                'updatedAtAttribute' => false,
            ],
        ];
    }
}
