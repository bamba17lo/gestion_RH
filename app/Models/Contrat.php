<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function donnee_professionelle()
    {
        $this->belongsTo(Donnee_Professionelle::class);
    }
}
