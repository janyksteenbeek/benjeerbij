<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid;

trait Uuidable
{
    /**
     * Cast the primary key type as a string.
     */
    public function initializeUuidable()
    {
        $this->setKeyType('string');
    }

    /**
     * Set the model to none incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Set the key of the model.
     *
     * @return void
     */
    public static function bootUuidable()
    {
        static::creating(function ($model) {
            if (! isset($model->attributes[$model->getKeyName()])) {
                $model->incrementing = false;
                $uuid = Uuid::uuid4();
                $model->attributes[$model->getKeyName()] = $uuid->toString();
            }
        }, 0);
    }
}
