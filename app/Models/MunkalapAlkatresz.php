<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MunkalapAlkatresz extends Model
{
    use HasFactory;

    protected $fillable = ['mennyiseg'];

    public function munkalapAlkatresz() : BelongsTo
    {
        return $this->belongsTo(Alkatresz::class, 'alkatresz_id');
    }

    public function munkalapAlkatresyMunkalap() : HasMany
    {
        return $this->hasMany(Munkalap::class,'munkalap_id');
    }
}
