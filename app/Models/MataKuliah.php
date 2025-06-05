<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    //
    protected $table = 'matakuliah';
    protected $fillable = ['kodemk', 'nama', 'prodi_id'];
    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
