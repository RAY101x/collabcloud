<?php

namespace App\Models;

<<<<<<< Updated upstream
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Support\Str;
>>>>>>> Stashed changes
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
<<<<<<< Updated upstream
    use HasFactory;
=======
    protected $fillable = [
        'name'
    ];

    public static function booted(): void
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
>>>>>>> Stashed changes
}
