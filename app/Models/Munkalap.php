<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Munkalap extends Model
{
    use HasFactory;

    protected $fillable = ['szerelo_azonosito, datum, munkafelvevo_azonosito, gepjarmu_rendszam, lezart, osszar, fizetesi_mod'];

    public function munkalapMunkalapAnyagok() : BelongsTo
    {
        return $this->belongsTo(Munkalap::class, 'munkalap_id');
    }
    
    public function munkalapMunkalapAlkatresz() : BelongsTo
    {
        return $this->belongsTo(Munkalap::class, 'munkalap_id');
    }
    public function munkalapMunkaFolyamat() : BelongsTo
    {
        return $this->belongsTo(Munkalap::class, 'munkalap_id');
    }

}
