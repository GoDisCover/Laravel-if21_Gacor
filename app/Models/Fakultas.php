<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasUlids;
    protected $fillable = ['nama', 'singkatan', 'nama_dekan', 'nama_wadek'];
}
