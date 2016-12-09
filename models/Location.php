<?php

namespace mgcode\location\models;

use mgcode\helpers\ActiveRecordHelperTrait;

/**
 * This is the model class for table "location".
 *
 * @property GooglePlace $google
 */
class Location extends AbstractLocation
{
    use ActiveRecordHelperTrait;
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGoogle()
    {
        return $this->hasOne(GooglePlace::className(), ['id' => 'google_id']);
    }

}
