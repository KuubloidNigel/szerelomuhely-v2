<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Munkafolyamat extends Model
{
    use HasFactory;

    protected $fillable = ['idotartam'];

    public function munkaFolyamat() : BelongsTo
    {
        return $this->belongsTo(Munkafolyamatok::class, 'munkafolyamatok_id');
    }

    public function munkaFolyamatMunkalap() : HasMany
    {
        return $this->hasMany(Munkalap::class,'munkalap_id');
    }
}
