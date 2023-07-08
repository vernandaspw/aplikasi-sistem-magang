<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMagang extends Model
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

    public function peserta()
    {
        return $this->belongsTo(User::class, 'peserta_id', 'id');
    }
    public function pembimbing()
    {
        return $this->belongsTo(User::class, 'pembimbing_id', 'id');
    }
    public function diterima_oleh()
    {
        return $this->belongsTo(User::class, 'diterima_oleh_id', 'id');
    }
    public function posisi()
    {
        return $this->belongsTo(Posisi::class, 'posisi_id', 'id');
    }
    public function bagian()
    {
        return $this->belongsTo(Bagian::class, 'bagian_id', 'id');
    }

    public function data_penilaian()
    {
        return $this->hasOne(DataPenilaian::class, 'data_magang_id', 'id');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

}
