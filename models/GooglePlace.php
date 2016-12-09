<?php

namespace mgcode\location\models;

use mgcode\helpers\ActiveRecordHelperTrait;

/**
 * This is the model class for table "google_place".
 * @property Location[] $locations
 */
class GooglePlace extends AbstractGooglePlace
{
    use ActiveRecordHelperTrait;

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocations()
    {
        return $this->hasMany(Location::className(), ['google_id' => 'id']);
    }

}
