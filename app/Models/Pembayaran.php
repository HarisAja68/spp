<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $guarded = [];

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
