<?php

namespace App\Traits;

trait CreatedUpdatedBy
{
    public static function bootCreatedUpdatedBy()
    {
        static::creating(function ($model) {
            if (!$model->isDirty('created_by')) {
                $model->created_by = (auth()->user())?auth()->user()->id:null;
            }
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = (auth()->user())?auth()->user()->id:null;
            }
        });

        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by')) {
                $model->updated_by = (auth()->user())?auth()->user()->id:null;
            }
        });
    }
}
