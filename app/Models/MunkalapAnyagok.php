<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class MunkalapAnyagok extends Model
{
    use HasFactory;

    protected $fillable = ['mennyiseg'];

    public function munkalapAnyagok() : BelongsTo
    {
        return $this->belongsTo(Anyag::class, 'anyag_id');
    }

    public function munkalapAnyagokMunkalap() : HasMany
    {
        return $this->hasMany(Munkalap::class,'munkalap_id');
    }
}
