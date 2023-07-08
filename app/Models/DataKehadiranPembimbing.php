<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKehadiranPembimbing extends Model
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

    public function pembimbing()
    {
        return $this->belongsTo(User::class,'pembimbing_id', 'id');
    }
}
