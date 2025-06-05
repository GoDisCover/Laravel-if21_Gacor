<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mata_kuliah extends Model
{
    //
    protected $table = 'mata_kuliah';
    protected $fillable = ['id','kode_mk','nama','prodi_id'];
    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}
