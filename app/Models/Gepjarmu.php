<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Gepjarmu extends Model
{
    use HasFactory;

    protected $fillable = ['idotartam'];

    public function gepjarmu() : BelongsTo
    {
        return $this->belongsTo(Tulajdonos::class, 'tulaj_id');
    }
}
