<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Munkafolyamatok extends Model
{
    use HasFactory;

    protected $fillable = ['nev'];

    public function munkafolyamatok() : HasMany
    {
        return $this->hasMany(Munkafolyamat::class,'munkafolyamatok_id');
    }
}
