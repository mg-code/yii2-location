<?php

namespace mgcode\location\models\queries;

use mgcode\helpers\ActiveQueryAliasTrait;
use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[\mgcode\location\models\Location]].
 *
 * @see \mgcode\location\models\Location
 */
class LocationQuery extends \yii\db\ActiveQuery
{
    use ActiveQueryAliasTrait;


    public function near($lat, $lon, $radius)
    {
        $alias = $this->getTableAlias();
        $this->andWhere(new Expression("
        (
            6371 * acos (
              cos ( radians(:lat) )
              * cos( radians( {$alias}.lat ) )
              * cos( radians( {$alias}.lng ) - radians(:lon) )
              + sin ( radians(:lat) )
              * sin( radians( {$alias}.lat ) )
            )
        ) <= :radius
        "), [
            ':lat' => (float) $lat,
            ':lon' => (float) $lon,
            ':radius' => (int) $radius
        ]);
    }

    /**
     * @inheritdoc
     * @return \mgcode\location\models\Location[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \mgcode\location\models\Location|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
