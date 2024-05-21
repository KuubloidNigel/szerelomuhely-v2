<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Tulajdonos extends Model
{
    use HasFactory;

    protected $fillable = ['nev','cim'];

    public function tulajdonos(): HasMany
    {
        return $this->hasMany(Gepjarmu::class,'tulaj_id');
    }
}
