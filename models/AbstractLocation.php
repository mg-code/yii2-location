<?php

namespace mgcode\location\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property string $id
 * @property string $google_id
 * @property string $region
 * @property string $city
 * @property string $address
 * @property string $zip_code
 * @property string $lat
 * @property string $lng
 * @property string $created_at
 * @property string $updated_at
 */
abstract class AbstractLocation extends \yii\db\ActiveRecord
{
    /** @inheritdoc */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lat', 'lng'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['updated_at'], 'required'],
            [['google_id', 'region', 'city', 'address', 'zip_code'], 'string', 'max' => 255],
            [['google_id'], 'exist', 'skipOnError' => true, 'targetClass' => GooglePlace::className(), 'targetAttribute' => ['google_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('mgcode.location', 'ID'),
            'google_id' => Yii::t('mgcode.location', 'Google ID'),
            'region' => Yii::t('mgcode.location', 'Region'),
            'city' => Yii::t('mgcode.location', 'City'),
            'address' => Yii::t('mgcode.location', 'Address'),
            'zip_code' => Yii::t('mgcode.location', 'Zip Code'),
            'lat' => Yii::t('mgcode.location', 'Lat'),
            'lng' => Yii::t('mgcode.location', 'Lng'),
            'created_at' => Yii::t('mgcode.location', 'Created At'),
            'updated_at' => Yii::t('mgcode.location', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     * @return \mgcode\location\models\queries\LocationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \mgcode\location\models\queries\LocationQuery(get_called_class());
    }
}
