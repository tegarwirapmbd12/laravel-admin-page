<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestingFour extends Model {

    use HasFactory;

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

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
