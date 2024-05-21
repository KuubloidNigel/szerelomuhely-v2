<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait; 

class Szerelo extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;
    protected $table = "szerelos";

    protected $fillable = ['nev', 'azonosito', 'jelszo']; 

    protected $hidden = ['jelszo'];


    public function szerelo(): HasMany
    {
        return $this->hasMany(Munkalap::class,'munkalap_id');
    }
}
