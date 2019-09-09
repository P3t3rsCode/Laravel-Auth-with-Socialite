<?php

namespace App;

use Illuminate\Support\Str;

/**
 * Trait Uuid
 * @package App\Models\Traits
 */
trait Uuid
{
    /**
     * @return string Using UUIDs as CHARs, so column type should be set to string
     */
    public function getKeyType()
    {
        return 'string';
    }

    /**
     * @return bool
     */
    public function getIncrementing(): bool
    {
        // Using UUIDs, so turn off Laravel's auto-incrementing on PKs.
        return false;
    }

    /**
     * @return string
     */
    public function getKeyName()
    {
        return 'id';
    }

    /**
     * Automatically create a UUID for this model on first creation
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = Str::orderedUuid();
        });
    }
}
