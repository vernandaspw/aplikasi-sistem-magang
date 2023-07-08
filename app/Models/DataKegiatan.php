<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKegiatan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->id = \Str::uuid()->toString();
        });
    }
}
