<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';

    protected $fillable = [
        'mata_kuliah_id',
        'dosenid',
        'pertemuan',
        'pokokbahasan',
        'filemateri',
    ];
    public function matakuliah() {
        return $this->belongsTo(MataKuliah::class, 'matakuliah_id', 'id');
    }
    public function dosen() {
        return $this->belongsTo(User::class, 'dosenid', 'id');
    }
    public function sesi() {
        return $this->belongsTo(Sesi::class, 'sesi_id', 'id');
    }
}