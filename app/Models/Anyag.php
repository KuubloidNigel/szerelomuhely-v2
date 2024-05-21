<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anyag extends Model
{
    use HasFactory;

    protected $fillable = ['nev','ar'];

    public function anyag(): HasMany
    {
        return $this->hasMany(MunkalapAnyagok::class,'anyag_id');
    }
}
