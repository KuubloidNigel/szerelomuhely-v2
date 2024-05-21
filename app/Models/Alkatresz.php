<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alkatresz extends Model
{
    use HasFactory;

    protected $fillable = ['nev','ar'];

    public function alkatresz(): HasMany
    {
        return $this->hasMany(MunkalapAlkatresz::class,'alkatresz_id');
    }
}
