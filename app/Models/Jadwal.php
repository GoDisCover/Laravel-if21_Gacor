<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    //
    protected $table = 'jadwal';
    protected $fillable = ['tahun_akademik', 'kode_smt', 'kelas','mata_kuliah_id','dosenid','sesi_id'];
    public function matakuliah() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id', 'id');
    }
    public function dosenid() {
        return $this->belongsTo(User::class, 'dosenid', 'id');
    }
    public function sesi() {
        return $this->belongsTo(Sesi::class, 'sesi_id', 'id');
    }

}
