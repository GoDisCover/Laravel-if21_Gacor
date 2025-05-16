<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    // use HasUlids;
    protected $table = 'mahasiswa';
    protected $fillable = ['nama','npm','jk','tanggal_lahir','tempat_lahir','asal_sma','prodi.id'];
    public function prodi(){
        return $this->belongsTo(Prodi::class,'prodi_id','id');
    }
}
