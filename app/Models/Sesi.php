<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sesi extends Model
{
    protected $table = 'sesi';
    public function sesi() {
        return $this->belongsTo(Sesi::class, 'id');
    }
}
