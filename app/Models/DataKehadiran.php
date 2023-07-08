<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKehadiran extends Model
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
        return $this->belongsTo(DataMagang::class,'data_magang_id', 'id');
    }

    public function peserta()
    {
        return $this->belongsTo(User::class,'peserta_id', 'id');
    }

    public function data_kegiatans()
    {
        return $this->hasMany(DataKegiatan::class);
    }
}
