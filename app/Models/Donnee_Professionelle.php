<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donnee_Professionelle extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function departement()
    {
        return $this->belongsTo(Departement::class,'id');
    }

    public function contrat()
    {
        return $this->belongsTo(Contrat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
