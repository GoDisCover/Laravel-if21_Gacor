<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasUlids;
    protected $table = 'prodi';
    protected $fillable = ['nama','singakatan','Kaprodi','Sekretaris','fakultas.id'];

    public function fakultas(){
        return $this->belongsTo(Fakultas::class,'fakultas_id','id');
    }
}
