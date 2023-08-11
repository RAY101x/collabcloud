<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'file'
    ];

    public static function booted(): void
    { 
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

}
