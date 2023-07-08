<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
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

    public function data_magang()
    {
        return $this->belongsTo(DataMagang::class, 'data_magang_id', 'id');
    }

    public function pengirim()
    {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }
    public function penerima()
    {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
}
