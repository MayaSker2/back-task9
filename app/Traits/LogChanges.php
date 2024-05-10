<?php

namespace App\Traits;

trait LogChanges
{
    public static function bootLogChanges()
    {
        static::created(function ($model) {
            \Log::info('Model ' . get_class($model) . ' created with ID ' . $model->id);
        });

        static::updated(function ($model) {
            \Log::info('Model ' . get_class($model) . ' updated with ID ' . $model->id);
        });

        static::deleted(function ($model) {
            \Log::info('Model ' . get_class($model) . ' deleted with ID ' . $model->id);
        });
    }
}
