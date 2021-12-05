<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $guarded = ([
        'id'
    ]);

    protected $table = 'shift';

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class);
    }
}
