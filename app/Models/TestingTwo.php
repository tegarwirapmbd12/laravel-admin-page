<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestingTwo extends Model {

    protected $fillable = ['name', 'description'];

    //

    protected static function booted(): void
    {
        static::creating(function ($model): void {
            if (! empty($model->uuid)) {
                return;
            }

            do {
                $uuid = (string) \Illuminate\Support\Str::uuid();
            } while (self::query()->where('uuid', $uuid)->exists());

            $model->uuid = $uuid;
        });
    }
}
