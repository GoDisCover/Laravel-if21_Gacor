<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasUuids;
    protected $table = 'prodi';

    public function fakultas() {
        return $this->belongsTo(Fakultas::class, 'fakultas_id', 'id');
    }
}
