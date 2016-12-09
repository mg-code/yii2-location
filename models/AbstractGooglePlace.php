<?php

namespace mgcode\location\models;

use Yii;

/**
 * This is the model class for table "google_place".
 *
 * @property string $id
 * @property string $name
 * @property string $full_name
 * @property string $type
 * @property string $url
 * @property string $location_lat
 * @property string $location_lng
 * @property string $viewport_ne_lat
 * @property string $viewport_ne_lng
 * @property string $viewport_sw_lat
 * @property string $viewport_sw_lng
 * @property string $raw_data
 * @property string $created_at
 */
abstract class AbstractGooglePlace extends \yii\db\ActiveRecord
{
    /** @inheritdoc */
    public static function tableName()
    {
        return 'google_place';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name', 'full_name', 'type', 'location_lat', 'location_lng'], 'required'],
            [['url', 'raw_data'], 'string'],
            [['location_lat', 'location_lng', 'viewport_ne_lat', 'viewport_ne_lng', 'viewport_sw_lat', 'viewport_sw_lng'], 'number'],
            [['created_at'], 'safe'],
            [['id', 'name', 'full_name'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('mgcode.location', 'ID'),
            'name' => Yii::t('mgcode.location', 'Name'),
            'full_name' => Yii::t('mgcode.location', 'Full Name'),
            'type' => Yii::t('mgcode.location', 'Type'),
            'url' => Yii::t('mgcode.location', 'Url'),
            'location_lat' => Yii::t('mgcode.location', 'Location Lat'),
            'location_lng' => Yii::t('mgcode.location', 'Location Lng'),
            'viewport_ne_lat' => Yii::t('mgcode.location', 'Viewport Ne Lat'),
            'viewport_ne_lng' => Yii::t('mgcode.location', 'Viewport Ne Lng'),
            'viewport_sw_lat' => Yii::t('mgcode.location', 'Viewport Sw Lat'),
            'viewport_sw_lng' => Yii::t('mgcode.location', 'Viewport Sw Lng'),
            'raw_data' => Yii::t('mgcode.location', 'Raw Data'),
            'created_at' => Yii::t('mgcode.location', 'Created At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \mgcode\location\models\queries\GooglePlaceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \mgcode\location\models\queries\GooglePlaceQuery(get_called_class());
    }
}
