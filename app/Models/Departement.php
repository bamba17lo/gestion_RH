<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function donnee_professionnelles()
    {
        return $this->hasMany(Donnee_Professionelle::class);
    }

}
