<?php

namespace mgcode\location\models\queries;

/**
 * This is the ActiveQuery class for [[\mgcode\location\models\GooglePlace]].
 *
 * @see \mgcode\location\models\GooglePlace
 */
class GooglePlaceQuery extends \yii\db\ActiveQuery
{
    /**
     * @inheritdoc
     * @return \mgcode\location\models\GooglePlace[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \mgcode\location\models\GooglePlace|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}